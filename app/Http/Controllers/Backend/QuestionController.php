<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Soal;
use App\Models\Ujian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $rules = [
            'question_number' => 'required|numeric',
            'question_title' => 'required',
            'option_a' => 'required',
            'option_b' => 'required',
            'option_c' => 'required',
            'option_d' => 'required',
            'option_e' => 'required',
            'score_benar' => 'required',
            'score_salah' => 'required',
            'score_lewat' => 'required',
            'answer_key' => 'required',
        ];

        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $pesan = $validator->errors();
            $pesanarr = explode(',', $pesan);
            $find = ['[', ']', '{', '}'];
            $html = '';
            foreach ($pesanarr as $p) {
                $html .= str_replace($find, '', $p) . '<br>';
            }
            return response()->json([
                'success' => false,
                'message' => $html,
            ]);
        }

        $input['question_image'] = null;
        $unik = uniqid();
        if ($request->hasFile('question_image')) {
            $input['question_image'] = Str::slug($unik, '-') . '.' . $request->question_image->getClientOriginalExtension();
            $request->question_image->move(public_path('/storage/image_files/soal'), $input['question_image']);
        }

        $input['option_image_a'] = null;
        $unik = uniqid();
        if ($request->hasFile('option_image_a')) {
            $input['option_image_a'] = Str::slug($unik, '-') . '.' . $request->option_image_a->getClientOriginalExtension();
            $request->option_image_a->move(public_path('/storage/image_files/soal'), $input['option_image_a']);
        }

        $input['option_image_b'] = null;
        $unik = uniqid();
        if ($request->hasFile('option_image_b')) {
            $input['option_image_b'] = Str::slug($unik, '-') . '.' . $request->option_image_b->getClientOriginalExtension();
            $request->option_image_b->move(public_path('/storage/image_files/soal'), $input['option_image_b']);
        }

        $input['option_image_c'] = null;
        $unik = uniqid();
        if ($request->hasFile('option_image_c')) {
            $input['option_image_c'] = Str::slug($unik, '-') . '.' . $request->option_image_c->getClientOriginalExtension();
            $request->option_image_c->move(public_path('/storage/image_files/soal'), $input['option_image_c']);
        }

        $input['option_image_d'] = null;
        $unik = uniqid();
        if ($request->hasFile('option_image_d')) {
            $input['option_image_d'] = Str::slug($unik, '-') . '.' . $request->option_image_d->getClientOriginalExtension();
            $request->option_image_d->move(public_path('/storage/image_files/soal'), $input['option_image_d']);
        }

        $input['option_image_e'] = null;
        $unik = uniqid();
        if ($request->hasFile('option_image_e')) {
            $input['option_image_e'] = Str::slug($unik, '-') . '.' . $request->option_image_e->getClientOriginalExtension();
            $request->option_image_e->move(public_path('/storage/image_files/soal'), $input['option_image_e']);
        }

        $input['admin_id'] = session('id');
        $soal = Soal::findorFail($input['soal_id']);

        $input['competition_id'] = $soal->competition_id;
        $input['study_id'] = $soal->study_id;
        $input['level_id'] = $soal->level_id;
        Ujian::create($input);
        return response()->json([
            'success' => true,
            'message' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $view = 'question';
        $soal = Soal::findorFail($id);
        return view('backend.transaction.question', compact('view', 'soal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Ujian::findorFail($id);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->all();
        $rules = [
            'question_number' => 'required|numeric',
            'question_title' => 'required',
            'option_a' => 'required',
            'option_b' => 'required',
            'option_c' => 'required',
            'option_d' => 'required',
            'option_e' => 'required',
            'score_benar' => 'required',
            'score_salah' => 'required',
            'score_lewat' => 'required',
            'answer_key' => 'required',
        ];

        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $pesan = $validator->errors();
            $pesanarr = explode(',', $pesan);
            $find = ['[', ']', '{', '}'];
            $html = '';
            foreach ($pesanarr as $p) {
                $html .= str_replace($find, '', $p) . '<br>';
            }
            return response()->json([
                'success' => false,
                'message' => $html,
            ]);
        }


        $ujian = Ujian::findorFail($id);

        $input['question_image'] = $ujian->question_image;
        $unik = uniqid();
        if ($request->hasFile('question_image')) {
            $input['question_image'] = Str::slug($unik, '-') . '.' . $request->question_image->getClientOriginalExtension();
            $request->question_image->move(public_path('/storage/image_files/soal'), $input['question_image']);
        }

        $input['option_image_a'] = $ujian->option_image_a;
        $unik = uniqid();
        if ($request->hasFile('option_image_a')) {
            $input['option_image_a'] = Str::slug($unik, '-') . '.' . $request->option_image_a->getClientOriginalExtension();
            $request->option_image_a->move(public_path('/storage/image_files/soal'), $input['option_image_a']);
        }

        $input['option_image_b'] = $ujian->option_image_b;
        $unik = uniqid();
        if ($request->hasFile('option_image_b')) {
            $input['option_image_b'] = Str::slug($unik, '-') . '.' . $request->option_image_b->getClientOriginalExtension();
            $request->option_image_b->move(public_path('/storage/image_files/soal'), $input['option_image_b']);
        }

        $input['option_image_c'] = $ujian->option_image_c;
        $unik = uniqid();
        if ($request->hasFile('option_image_c')) {
            $input['option_image_c'] = Str::slug($unik, '-') . '.' . $request->option_image_c->getClientOriginalExtension();
            $request->option_image_c->move(public_path('/storage/image_files/soal'), $input['option_image_c']);
        }

        $input['option_image_d'] = $ujian->option_image_d;
        $unik = uniqid();
        if ($request->hasFile('option_image_d')) {
            $input['option_image_d'] = Str::slug($unik, '-') . '.' . $request->option_image_d->getClientOriginalExtension();
            $request->option_image_d->move(public_path('/storage/image_files/soal'), $input['option_image_d']);
        }

        $input['option_image_e'] = $ujian->option_image_e;
        $unik = uniqid();
        if ($request->hasFile('option_image_e')) {
            $input['option_image_e'] = Str::slug($unik, '-') . '.' . $request->option_image_e->getClientOriginalExtension();
            $request->option_image_e->move(public_path('/storage/image_files/soal'), $input['option_image_e']);
        }

        $input['admin_id'] = session('id');
        $soal = Soal::findorFail($input['soal_id']);

        $input['competition_id'] = $soal->competition_id;
        $input['study_id'] = $soal->study_id;
        $input['level_id'] = $soal->level_id;
        $ujian->update($input);
        return response()->json([
            'success' => true,
            'message' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        return Ujian::destroy($id);
    }


    public function preview($id) {
        $ujian = Ujian::with('competition','study.pelajaran','level')->findorFail($id);
        $orientation = $ujian->orientation;
        if($orientation == 1) {
            $style = 'text-align:right';
        } else if($orientation == 2) {
            $style = 'text-align:center';
        } else {
            $style = 'text-align:left';
        }


        $html = '';
        $html .= '<table class="table table-bordered table-striped">';
        $html .= '<tr>';
        $html .= '<td>No Soal: </td>';
        $html .= '<td>:</td>';
        $html .= '<td>'.$ujian->question_number.'</td>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<td>Pertanyaan: </td>';
        $html .= '<td>:</td>';
        if($ujian->question_image === null) {
            $html .= '<td style="'.$style.'">'.$ujian->question_title.'</td>';
        } else {
            $html .= '<td style="'.$style.'"><img style="margin-bottom:20px;" class="img-responsive" src="'.asset('storage/image_files/soal/'.$ujian->question_image).'">'.$ujian->question_title.'</td>';
        }
        
        $html .= '</tr>';

        $html .= '<tr>';
        $html .= '<td>Option A: </td>';
        $html .= '<td>:</td>';
        if($ujian->option_image_a === null) {
            $html .= '<td style="'.$style.'">'.$ujian->option_a.'</td>';
        } else {
            $html .= '<td style="'.$style.'"><img style="margin-bottom:20px;" class="img-responsive" src="'.asset('storage/image_files/soal/'.$ujian->option_image_a).'">'.$ujian->option_a.'</td>';
        }
        
        $html .= '</tr>';


        $html .= '<tr>';
        $html .= '<td>Option B: </td>';
        $html .= '<td>:</td>';
        if($ujian->option_image_b === null) {
            $html .= '<td style="'.$style.'">'.$ujian->option_b.'</td>';
        } else {
            $html .= '<td style="'.$style.'"><img style="margin-bottom:20px;" class="img-responsive" src="'.asset('storage/image_files/soal/'.$ujian->option_image_b).'">'.$ujian->option_b.'</td>';
        }
        
        $html .= '</tr>';


        $html .= '<tr>';
        $html .= '<td>Option C: </td>';
        $html .= '<td>:</td>';
        if($ujian->option_image_c === null) {
            $html .= '<td style="'.$style.'">'.$ujian->option_c.'</td>';
        } else {
            $html .= '<td style="'.$style.'"><img style="margin-bottom:20px;" class="img-responsive" src="'.asset('storage/image_files/soal/'.$ujian->option_image_c).'">'.$ujian->option_c.'</td>';
        }
        
        $html .= '</tr>';


        $html .= '<tr>';
        $html .= '<td>Option D: </td>';
        $html .= '<td>:</td>';
        if($ujian->option_image_d === null) {
            $html .= '<td style="'.$style.'">'.$ujian->option_d.'</td>';
        } else {
            $html .= '<td style="'.$style.'"><img style="margin-bottom:20px;" class="img-responsive" src="'.asset('storage/image_files/soal/'.$ujian->option_image_d).'">'.$ujian->option_d.'</td>';
        }
        
        $html .= '</tr>';


        $html .= '<tr>';
        $html .= '<td>Option E: </td>';
        $html .= '<td>:</td>';
        if($ujian->option_image_e === null) {
            $html .= '<td style="'.$style.'">'.$ujian->option_e.'</td>';
        } else {
            $html .= '<td style="'.$style.'"><img style="margin-bottom:20px;" class="img-responsive" src="'.asset('storage/image_files/soal/'.$ujian->option_image_e).'">'.$ujian->option_e.'</td>';
        }
        
        $html .= '</tr>';

        $html .= '<tr>';
        $html .= '<td>Kunci Jawaban: </td>';
        $html .= '<td>:</td>';
        $html .= '<td>'.strtoupper($ujian->answer_key).'</td>';
        $html .= '</tr>';

        $html .= '<tr>';
        $html .= '<td>Orientasi: </td>';
        $html .= '<td>:</td>';
        if($ujian->orientation == 1) {
            $html .= '<td>Rata Kanan</td>';
        } else if($ujian->orientation == 2) {
            $html .= '<td>Rata Tengah</td>';
        } else {
            $html .= '<td>Rata Kiri</td>';
        }
        $html .= '</tr>';        

        $html .= '</table>';

        $data['html'] = $html;
        $data['data'] = $ujian;

        return $data;
    }

    public function question_table($id)
    {
        $data = Ujian::with('competition', 'study', 'level')->where('soal_id', $id)->get();

        return DataTables::of($data)
            ->addColumn('answer_key', function($data){
                return strtoupper($data->answer_key);
            })
            ->addColumn('score_benar', function($data){
                $html = '';
                $html .= '<ul>';
                $html .= '<li> Score Benar : '.$data->score_benar.'</li>';
                $html .= '<li> Score Salah : '.$data->score_salah.'</li>';
                $html .= '<li> Score Lewat : '.$data->score_lewat.'</li>';
                $html .= '</ul>';
                return $html;
            })
            ->addColumn('question_title', function ($data) {
                if ($data->question_image !== null) {
                    return '<a href="' . asset('storage/image_files/soal/' . $data->question_image) . '" target="_blank"><img class="image-soal" src="' . asset('storage/image_files/soal/' . $data->question_image) . '"></a><br>' . $data->question_title;
                } else {
                    return $data->question_title;
                }
            })


            ->addColumn('option_a', function ($data) {
                if ($data->option_image_a !== null) {
                    return '<a href="' . asset('storage/image_files/soal/' . $data->option_image_a) . '" target="_blank"><img class="image-soal" src="' . asset('storage/image_files/soal/' . $data->option_image_a) . '"></a><br>' . $data->option_a;
                } else {
                    return $data->option_a;
                }
            })
            ->addColumn('option_b', function ($data) {
                if ($data->option_image_b !== null) {
                    return '<a href="' . asset('storage/image_files/soal/' . $data->option_image_b) . '" target="_blank"><img class="image-soal" src="' . asset('storage/image_files/soal/' . $data->option_image_b) . '"></a><br>' . $data->option_b;
                } else {
                    return $data->option_b;
                }
            })
            ->addColumn('option_c', function ($data) {
                if ($data->option_image_c !== null) {
                    return '<a href="' . asset('storage/image_files/soal/' . $data->option_image_c) . '" target="_blank"><img class="image-soal" src="' . asset('storage/image_files/soal/' . $data->option_image_c) . '"></a><br>' . $data->option_c;
                } else {
                    return $data->option_c;
                }
            })
            ->addColumn('option_d', function ($data) {
                if ($data->option_image_d !== null) {
                    return '<a href="' . asset('storage/image_files/soal/' . $data->option_image_d) . '" target="_blank"><img class="image-soal" src="' . asset('storage/image_files/soal/' . $data->option_image_d) . '"></a><br>' . $data->option_d;
                } else {
                    return $data->option_d;
                }
            })
            ->addColumn('option_e', function ($data) {
                if ($data->option_image_e !== null) {
                    return '<a href="' . asset('storage/image_files/soal/' . $data->option_image_e) . '" target="_blank"><img class="image-soal" src="' . asset('storage/image_files/soal/' . $data->option_image_e) . '"></a><br>' . $data->option_e;
                } else {
                    return $data->option_e;
                }
            })
            ->addColumn('admin_id', function ($data) {
                return $data->admin->name;
            })
            ->addColumn('competition_id', function ($data) {
                $html = '';

                if($data->competition == null) {
                    $html .= null;
                } else {
                    $html .= $data->competition->title;

                    if($data->study == null) {
                        $html .= null;
                    } else {
                        if($data->study->pelajaran == null) {
                            $html .= null;
                        } else {
                            $html .= '<br>'.$data->study->pelajaran->name;

                            if($data->level == null) {
                                $html .= null;

                            } else {
                                $html .= '<br>'.$data->level->level_name;
                            }
                        }
                    }
                }

                // $html .= $data->competition == null ? null : $data->competition->title;
                // $html .= '<br>';

                // $html .= $data->study->pelajaran == null ? null : $data->study->pelajaran->name;
                // $html .= '<br>';
                // $html .= $data->level == null ? null : $data->level->level_name;



                return $html;
            })
            ->addColumn('action', function ($data) {
                return '
                <a onclick="preview('.$data->id.')" title="Preview Soal" href="javascript:void(0);" class="w-32-px h-32-px bg-info-focus text-primary-main rounded-circle d-inline-flex align-items-center justify-content-center">
                  <iconify-icon icon="material-symbols:preview-sharp"></iconify-icon>
                </a>
                <a onclick="editData(' .
                    $data->id .
                    ')" href="javascript:void(0)" class="w-32-px h-32-px bg-warning-focus text-warning-main rounded-circle d-inline-flex align-items-center justify-content-center">
                  <iconify-icon icon="lucide:edit"></iconify-icon>
                </a>
                <a onclick="deleteData(' .
                    $data->id .
                    ')" href="javascript:void(0)" class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                  <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                </a>';
            })
            ->rawColumns(['action', 'question_title', 'option_a', 'option_b', 'option_c', 'option_d', 'option_e', 'competition_id','score_benar'])
            ->addIndexColumn()
            ->make(true);
    }
}
