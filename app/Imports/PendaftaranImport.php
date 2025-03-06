<?php

namespace App\Imports;

use App\Models\Competition;
use App\Models\Invoice;
use App\Models\PendaftaranLog;
use App\Models\Study;
use App\Models\Transaction;
use App\Models\User;
use App\Traits\HelperTrait;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PendaftaranImport implements ToModel, WithHeadingRow
{
    use HelperTrait;

    /**
     * @param Collection $collection
     */

    protected $id;
    protected $bentuk_kompetisi;
    protected $index = 0;
    protected $invoice_id = 0;
    protected $invoice = 0;
    protected $userid = 0;
    protected $total_harga = 0;

    public function set_id($id, $bentuk_kompetisi)
    {
        $this->id = $id;
        $this->bentuk_kompetisi = $bentuk_kompetisi;
    }

    public function model(array $row)
    {
        if ($row['nama_lengkap'] == null || $row['email'] == null) {
            return null;
        }

        $study = Study::find($this->id);
        $com = Competition::find($study->competition_id);

        $cek_user = User::where('email', $row['email']);
        if ($cek_user->count() > 0) {
            $user = $cek_user->first();
            $this->userid = $user->id;
        } else {
            $insert = User::create([
                'name' => $row['nama_lengkap'],
                'username' => uniqid(),
                'email' => $row['email'],
                'whatsapp' => $row['nomor_hp'],
                'password' => bcrypt('posijuara'),
                'level_id' => $study->level_id,
                'email_status' => 1
            ]);

            $this->userid = $insert->id;
        }


        if ($this->index == 0) {
            $invoice = 'INV-' . date('YmdHis') . $this->generate_number(6);
            $dt = new Invoice();
            $dt->invoice = $invoice;
            $dt->userid = $this->userid;
            $dt->total_amount = 0;
            $dt->payment_status = 1;
            $dt->transaction_status = 1;
            $dt->buyer = $this->userid;
            $dt->grand_total = 0;
            $dt->save();

            $this->invoice_id = $dt->id;
            $this->invoice = $invoice;
        }

        $trans = new Transaction();
        $trans->userid = $this->userid;
        $trans->invoice = $this->invoice;
        $trans->invoice_id = $this->invoice_id;
        $trans->competition_id = $study->competition_id;
        $trans->study_id = $study->id;
        $trans->amount = $this->bentuk_kompetisi == 'free' ? 0 : $com->price;
        $trans->is_fisik = 0;
        $trans->quantity = 1;
        $trans->unit_price = $this->bentuk_kompetisi == 'free' ? 0 : $com->price;
        $trans->buyer = $this->userid;
        $trans->save();

        $this->total_harga = $this->total_harga + $com->price;
        $this->index = $this->index + 1;

        Invoice::where('id', $this->invoice_id)->update([
            "total_amount" => $this->bentuk_kompetisi == 'free' ? 0 : $this->total_harga,
            "delivery_cost" => 0,
            "payment_with" => "admin payment",
            "payment_amount" => $this->bentuk_kompetisi == 'free' ? 0 : $this->total_harga,
            "payment_date" => date('Y-m-d H:i:s'),
            "grand_total" => $this->bentuk_kompetisi == 'free' ? 0 : $this->total_harga
        ]);


        return new PendaftaranLog([
            'admin_id' => session('id'),
        ]);
    }
}
