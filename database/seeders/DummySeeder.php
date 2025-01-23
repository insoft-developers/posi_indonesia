<?php

namespace Database\Seeders;

use App\Models\Invoice;
use App\Models\Transaction;
use App\Models\User;
use App\Traits\HelperTrait;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummySeeder extends Seeder
{
    use HelperTrait;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::whereNull('google_id')->get();

        foreach ($users as $user) {
            if ($user->id !== 101) {
                $inv = 'INV-' . date('YmdHis') . $this->generate_number(6);

                $invoice = new Invoice();
                $invoice->invoice = $inv;
                $invoice->userid = $user->id;
                $invoice->total_amount = 150000;
                $invoice->payment_status = 1;
                $invoice->transaction_status = 1;
                $invoice->payment_amount = 150000;
                $invoice->payment_date = now();
                $invoice->expired_time = now();
                $invoice->created_at = now();
                $invoice->updated_at = now();
                $invoice->save();

                $id = $invoice->id;

                Transaction::create([
                    'userid' => $user->id,
                    'invoice' => $inv,
                    'invoice_id' => $id,
                    'competition_id' => 1,
                    'study_id' => 1,
                    'amount' => 50000,
                    'is_fisik' => 0,
                ]);

                Transaction::create([
                    'userid' => $user->id,
                    'invoice' => $inv,
                    'invoice_id' => $id,
                    'competition_id' => 1,
                    'study_id' => 2,
                    'amount' => 50000,
                    'is_fisik' => 0,
                ]);

                Transaction::create([
                    'userid' => $user->id,
                    'invoice' => $inv,
                    'invoice_id' => $id,
                    'competition_id' => 1,
                    'study_id' => 3,
                    'amount' => 50000,
                    'is_fisik' => 0,
                ]);
            }
        }
    }
}
