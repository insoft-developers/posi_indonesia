<?php

namespace Database\Seeders;

use App\Models\ExamSession;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UjianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::whereNull('google_id')->get();

        foreach ($users as $user) {
            $tr = Transaction::where('competition_id', 1)
                ->where('study_id', 1)
                ->where('userid', $user->id);
            if ($tr->count() > 0) {
                $e = new ExamSession();
                $e->transaction_id = $tr->first()->id;
                $e->invoice_id = $tr->first()->invoice_id;
                $e->competition_id = 1;
                $e->study_id = 1;
                $e->userid = $user->id;
                $e->token = SHA1(uniqid());
                $e->is_finish = 1;
                $e->save();
            }
        }
    }
}
