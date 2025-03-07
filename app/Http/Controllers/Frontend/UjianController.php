<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ExamSession;
use App\Models\Transaction;
use App\Models\Ujian;
use App\Models\UserAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UjianController extends Controller
{
    public function index($token)
    {
        $view = 'ujian';
        $session = ExamSession::with('competition', 'study.pelajaran')->where('token', $token)->first();
        

        if($session->is_finish == 1) {
            return redirect()->to('jadwal');
        }

        $soal = Ujian::where('competition_id', $session->competition_id)
            ->where('study_id', $session->study_id)
            ->get();
        $exists = UserAnswer::where('session_id', $session->id)->where('id_soal', $soal[session('nomor') ?? 0]->id);

        if ($exists->count() > 0) {
            $ada = 1;
            $exist = $exists->first();
            if ($exist->jawaban_soal == 'a') {
                $selected = 1;
            } elseif ($exist->jawaban_soal == 'b') {
                $selected = 2;
            } elseif ($exist->jawaban_soal == 'c') {
                $selected = 3;
            } elseif ($exist->jawaban_soal == 'd') {
                $selected = 4;
            } elseif ($exist->jawaban_soal == 'e') {
                $selected = 5;
            } elseif ($exist->jawaban_soal == 'f') {
                $selected = 6;
            }
        } else {
            $ada = 0;
            $exist = [];
            $selected = 0;
        }

        return view('frontend.ujian', compact('view', 'session', 'soal', 'exist', 'selected', 'ada'));
    }

    public function ujian_start(Request $request)
    {
        $input = $request->all();

        try {
            $transaction = Transaction::findorFail($input['id']);

            $unik = uniqid();
            $token = SHA1($unik);

            $data_input = [
                'transaction_id' => $input['id'],
                'invoice_id' => $transaction->invoice_id,
                'competition_id' => $transaction->competition_id,
                'study_id' => $transaction->study_id,
                'userid' => Auth::user()->id,
                'token' => $token,
                "jumlah_benar" => 0,
                "jumlah_salah" => 0,
                "jumlah_lewat" => 0,
                "total_score" => 0
            ];


            $data_update = [
                'transaction_id' => $input['id'],
                'invoice_id' => $transaction->invoice_id,
                'competition_id' => $transaction->competition_id,
                'study_id' => $transaction->study_id,
                'userid' => Auth::user()->id,
                'token' => $token,
            ];

            $cek = ExamSession::where('transaction_id', $input['id'])->where('userid', Auth::user()->id);
            if ($cek->count() > 0) {
                ExamSession::where('transaction_id', $input['id'])
                    ->where('userid', Auth::user()->id)
                    ->update($data_update);
            } else {
                ExamSession::create($data_input);
            }
            return response()->json([
                'success' => true,
                'message' => 'success',
                'data' => $token,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function simpan_jawaban(Request $request)
    {
        $input = $request->all();

        $session = ExamSession::with('competition', 'study.pelajaran')
            ->where('token', $input['token_id'])
            ->first();
        $soal = Ujian::where('competition_id', $session->competition_id)
            ->where('study_id', $session->study_id)
            ->get();

        $jumlah_soal = $soal->count();
        $variabel = $jumlah_soal - 1;

        if ($variabel == $input['active']) {
        } else {
            $exist = UserAnswer::where('session_id', $session->id)->where('id_soal', $soal[$input['active'] + 1]->id);
            if ($exist->count() > 0) {
                $ada = 1;
                $exists = $exist->first();
            } else {
                $ada = 0;
                $exists = [];
            }
        }

        $jawaban = $input['selected_answer'];
        if ($jawaban == 1) {
            $pilihan = 'a';
        } elseif ($jawaban == 2) {
            $pilihan = 'b';
        } elseif ($jawaban == 3) {
            $pilihan = 'c';
        } elseif ($jawaban == 4) {
            $pilihan = 'd';
        } elseif ($jawaban == 5) {
            $pilihan = 'e';
        } elseif ($jawaban == 6) {
            $pilihan = 'f';
        }

        $soal_terpilih = $soal[$input['active']];

        if ($pilihan == 'f') {
            $hasil = 'lewat';
            $score = $soal_terpilih->score_lewat;
        } else {
            if ($pilihan == $soal_terpilih->answer_key) {
                $hasil = 'Benar';
                $score = $soal_terpilih->score_benar;
            } else {
                $hasil = 'Salah';
                $score = $soal_terpilih->score_salah;
            }
        }

        $data_insert = [
            'session_id' => $session->id,
            'id_soal' => $input['id_soal'],
            'nomor_soal' => $input['no_soal'],
            // 'jawaban_soal' => $pilihan,
            // 'hasil_jawaban' => $hasil,
            // 'score' => $score,
        ];

        if($pilihan !== 'f') {
            $data_insert['jawaban_soal'] = $pilihan;
            $data_insert['hasil_jawaban'] = $hasil;
            $data_insert['score'] = $score;
            UserAnswer::updateOrCreate(['session_id' => $session->id, 'id_soal' => $input['id_soal']], $data_insert);
        }



       

        if ((int) $input['active'] < (int) $variabel) {
            $active = $input['active'] + 1;
            session(['nomor' => $active]);
        } else {
            $active = $input['active'];
            session(['nomor' => $active]);
        }

        if ($variabel == $input['active']) {
            return response()->json([
                'success' => false,
                'message' => 'Ini adalah soal terakhir',
            ]);
        } else {
            return response()->json([
                'success' => true,
                'data' => $soal,
                'active' => $active,
                'ada' => $ada,
                'exist' => $exists,
            ]);
        }
    }

    public function jawaban_sebelumnya(Request $request)
    {
        $input = $request->all();
        $session = ExamSession::with('competition', 'study.pelajaran')
            ->where('token', $input['token_id'])
            ->first();
        $soal = Ujian::where('competition_id', $session->competition_id)
            ->where('study_id', $session->study_id)
            ->get();

        $exist = UserAnswer::where('session_id', $session->id)->where('id_soal', $soal[$input['active'] - 1]->id);
        if ($exist->count() > 0) {
            $ada = 1;
            $exists = $exist->first();
        } else {
            $ada = 0;
            $exists = [];
        }

        if ((int) $input['active'] > 0) {
            $active = $input['active'] - 1;
            session(['nomor' => $active]);
        } else {
            $active = 0;
            session(['nomor' => 0]);
        }

        return response()->json([
            'success' => true,
            'data' => $soal,
            'active' => $active,
            'exist' => $exists,
            'ada' => $ada,
        ]);
    }

    public function ujian_selesai()
    {
        $view = 'ujian-selesai';
        session()->forget('nomor');
        return view('frontend.ujian_selesai', compact('view'));
    }

    public function list_soal(Request $request)
    {
        $input = $request->all();

        $session = ExamSession::with('competition', 'study.pelajaran')
            ->where('token', $input['token_id'])
            ->first();
        $soal = Ujian::where('competition_id', $session->competition_id)->get();

        $rows = [];

        foreach ($soal as $indeks => $s) {
            $cek = UserAnswer::where('session_id', $session->id)->where('id_soal', $s->id)->where('jawaban_soal', '!=', 'f');
            if ($cek->count() > 0) {
                $row['exist'] = 1;
            } else {
                $row['exist'] = 0;
            }
            $row['question_number'] = $s->question_number;
            $row['id'] = $s->id;
            $row['urutan'] = $indeks;
            array_push($rows, $row);
        }

        return response()->json([
            'success' => true,
            'data' => $rows,
        ]);
    }

    public function goto(Request $request)
    {
        $input = $request->all();
        $session = ExamSession::with('competition', 'study.pelajaran')
            ->where('token', $input['token_id'])
            ->first();
        $soal = Ujian::where('competition_id', $session->competition_id)
            ->where('study_id', $session->study_id)
            ->get();

        $exist = UserAnswer::where('session_id', $session->id)->where('id_soal', $soal[$input['active']]->id);
        if ($exist->count() > 0) {
            $ada = 1;
            $exists = $exist->first();
        } else {
            $ada = 0;
            $exists = [];
        }

        $active = $input['active'];
        session(['nomor' => $active]);

        return response()->json([
            'success' => true,
            'data' => $soal,
            'active' => $active,
            'exist' => $exists,
            'ada' => $ada,
        ]);
    }

    public function selesai_ujian(Request $request) {
        $input = $request->all();
        $token = uniqid();
        $new_token = SHA1($token);

        $session = ExamSession::where('token', $input['token_id'])->first();
        $session->is_finish = 1;
        $session->token = $new_token;
        $session->save();

        return response()->json([
            "success" => true
        ]);
    }
}
