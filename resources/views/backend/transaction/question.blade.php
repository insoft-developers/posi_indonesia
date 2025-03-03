@extends('backend.master')
@section('content')
    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0"></h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="{{ url('posiadmin/soal') }}" class="d-flex align-items-center gap-1 hover-text-primary">

                        Data Pertanyaan
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Daftar Pertanyaan</li>
                <li>-</li>
                <li class="fw-medium">{{ $soal->competition->title }}</li>
                <li>-</li>
                <li class="fw-medium">{{ $soal->study->pelajaran->name }}</li>
                <li>-</li>
                <li class="fw-medium">{{ $soal->level->level_name }}</li>
            </ul>
        </div>

        <div class="card basic-data-table">
            <div class="card-header">
                <h5 class="card-title mb-0">Daftar Pertanyaan</h5>
                <button onclick="tambah()" type="button" class="btn btn-insoft btn-success-600 radius-8 px-20 py-11"> +
                    Tambah</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <table style="width: 100%;" class="table bordered-table mb-0" id="table-list">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Action</th>
                                <th scope="col">Kompetisi </th>
                                <th scope="col">No Soal</th>
                                <th scope="col">Pertanyaan</th>
                                <th scope="col">Option A</th>
                                <th scope="col">Option B</th>
                                <th scope="col">Option C</th>
                                <th scope="col">Option D</th>
                                <th scope="col">Option E</th>
                                <th scope="col">Score</th>
                                <th scope="col">Kunci</th>
                                <th scope="col">Admin</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-tambah">
        <div class="modal-dialog">
            <form id="form-tambah" enctype="multipart/form-data">
                {{ csrf_field() }} {{ method_field('POST') }}
                <input type="hidden" id="id" name="id">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" id="soal_id" name="soal_id" value="{{ Request::segment(3) }}">
                            <div style="margin-top:15px;"></div>
                            <div class="col-12">
                                <label class="form-label">Nomor Soal</label>
                                <input type="number" id="question_number" name="question_number" class="form-control">
                            </div>
                            <div style="margin-top:15px;"></div>
                            <div class="col-12">
                                <label class="form-label">Gambar Soal</label>
                                <input type="file" id="question_image" name="question_image" class="form-control"
                                    accept="*.jpg, *.jpeg, *.png">
                            </div>
                            <div style="margin-top:15px;"></div>
                            <div class="col-12">
                                <label class="form-label">Soal Pertanyaan</label>
                                <textarea id="question_title" name="question_title" class="form-control"></textarea>
                            </div>

                            <div style="margin-top:15px;"></div>
                            <div class="col-12">
                                <label class="form-label">Gambar Option A</label>
                                <input type="file" id="option_image_a" name="option_image_a" class="form-control"
                                    accept="*.jpg, *.jpeg, *.png">
                            </div>
                            <div style="margin-top:15px;"></div>
                            <div class="col-12">
                                <label class="form-label">Option A</label>
                                <textarea id="option_a" name="option_a" class="form-control"></textarea>
                            </div>

                            <div style="margin-top:15px;"></div>
                            <div class="col-12">
                                <label class="form-label">Gambar Option B</label>
                                <input type="file" id="option_image_b" name="option_image_b" class="form-control"
                                    accept="*.jpg, *.jpeg, *.png">
                            </div>
                            <div style="margin-top:15px;"></div>
                            <div class="col-12">
                                <label class="form-label">Option B</label>
                                <textarea id="option_b" name="option_b" class="form-control"></textarea>
                            </div>

                            <div style="margin-top:15px;"></div>
                            <div class="col-12">
                                <label class="form-label">Gambar Option C</label>
                                <input type="file" id="option_image_c" name="option_image_c" class="form-control"
                                    accept="*.jpg, *.jpeg, *.png">
                            </div>
                            <div style="margin-top:15px;"></div>
                            <div class="col-12">
                                <label class="form-label">Option C</label>
                                <textarea id="option_c" name="option_c" class="form-control"></textarea>
                            </div>


                            <div style="margin-top:15px;"></div>
                            <div class="col-12">
                                <label class="form-label">Gambar Option D</label>
                                <input type="file" id="option_image_d" name="option_image_d" class="form-control"
                                    accept="*.jpg, *.jpeg, *.png">
                            </div>
                            <div style="margin-top:15px;"></div>
                            <div class="col-12">
                                <label class="form-label">Option D</label>
                                <textarea id="option_d" name="option_d" class="form-control"></textarea>
                            </div>

                            <div style="margin-top:15px;"></div>
                            <div class="col-12">
                                <label class="form-label">Gambar Option E</label>
                                <input type="file" id="option_image_e" name="option_image_e" class="form-control"
                                    accept="*.jpg, *.jpeg, *.png">
                            </div>
                            <div style="margin-top:15px;"></div>
                            <div class="col-12">
                                <label class="form-label">Option E</label>
                                <textarea id="option_e" name="option_e" class="form-control"></textarea>
                            </div>
                            <div style="margin-top:15px;"></div>
                            <div class="col-4">
                                <label class="form-label">Score Benar</label>
                                <input type="number" id="score_benar" name="score_benar" class="form-control">
                            </div>
                            <div class="col-4">
                                <label class="form-label">Score Salah</label>
                                <input type="number" id="score_salah" name="score_salah" class="form-control">
                            </div>
                            <div class="col-4">
                                <label class="form-label">Score Lewat</label>
                                <input type="number" id="score_lewat" name="score_lewat" class="form-control">
                            </div>

                            <div style="margin-top:15px;"></div>
                            <div class="col-12">
                                <label class="form-label">Kunci Jawaban</label>
                                <select id="answer_key" name="answer_key" class="form-control">
                                    <option value=""> - Pilih - </option>
                                    <option value="a">A</option>
                                    <option value="b">B</option>
                                    <option value="c">C</option>
                                    <option value="d">D</option>
                                    <option value="e">E</option>


                                </select>
                            </div>
                            <div style="margin-top:15px;"></div>
                            <div class="col-12">
                                <label class="form-label">Orientasi Soal</label>
                                <select id="orientation" name="orientation" class="form-control">
                                    <option value=""> - Pilih - </option>
                                    <option value="0">Rata Kiri</option>
                                    <option value="2">Rata Tengah</option>
                                    <option value="1">Rata Kanan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button id="btn-simpan-data" type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>



    <div class="modal fade" id="modal-preview">
        <div class="modal-dialog modal-xl">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div id="modal-preview-content"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>

        </div>
    </div>
@endsection
