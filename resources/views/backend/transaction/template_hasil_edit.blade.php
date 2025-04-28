<!DOCTYPE html>
<html>

<head>
    <title>Form Edit Hasil Ujian</title>
    <style>
        body {
            margin-left: 15em;
            margin-right: 15em;
            margin-top: 5em;
            margin-bottom: 5em;
            color: #fff;
            background-color: #000;
        }
    </style>
</head>

<body>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="listTable" class="table table-striped table-bordered table-hover table-custom"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th style="background-color:whitesmoke;font-weight:bold;">No</th>
                                    <th style="background-color:whitesmoke;font-weight:bold;">id</th>
                                    <th style="background-color:whitesmoke;font-weight:bold;">tanggal</th>
                                    <th style="background-color:whitesmoke;font-weight:bold;">kompetisi</th>
                                    <th style="background-color:whitesmoke;font-weight:bold;">bidang_studi</th>
                                    <th style="background-color:whitesmoke;font-weight:bold;">peserta</th>
                                    <th style="background-color:whitesmoke;font-weight:bold;">email</th>
                                    <th style="background-color:whitesmoke;font-weight:bold;">hp</th>
                                    <th style="background-color:whitesmoke;font-weight:bold;">sekolah</th>
                                    <th style="background-color:whitesmoke;font-weight:bold;">jenjang</th>
                                    <th style="background-color:whitesmoke;font-weight:bold;">kelas</th>
                                    <th style="background-color:whitesmoke;font-weight:bold;">provinsi</th>
                                    <th style="background-color:whitesmoke;font-weight:bold;">kota</th>
                                    <th style="background-color:whitesmoke;font-weight:bold;">kecamatan</th>
                                    <th style="background-color:whitesmoke;font-weight:bold;">jenis_kelamin</th>
                                    <th style="background-color:whitesmoke;font-weight:bold;">agama</th>
                                    <th style="background-color:whitesmoke;font-weight:bold;">status</th>
                                    <th>benar</th>
                                    <th>salah</th>
                                    <th>lewat</th>
                                    <th>score</th>
                                </tr>
                            </thead>
                            <tbody>

                                    @foreach($data as $index => $d)
                                    <tr>
                                        <td style="text-align:left;background-color:beige;">{{ $index + 1 }}</td>
                                        <td style="text-align:left;background-color:beige;">{{ $d->id }}</td>
                                        <td style="text-align:left;background-color:beige;">{{ date('d-m-Y', strtotime($d->created_at)) }}</td>
                                        <td style="text-align:left;background-color:beige;">{{ $d->competition->title ?? null }}</td>
                                        <td style="text-align:left;background-color:beige;">{{ $d->study->pelajaran->name }}</td>
                                        <td style="text-align:left;background-color:beige;">{{ $d->user->name }}</td>
                                        <td style="text-align:left;background-color:beige;">{{ $d->user->email }}</td>
                                        <td style="text-align:left;background-color:beige;">{{ $d->user->whatsapp }}</td>
                                        <td style="text-align:left;background-color:beige;">{{ $d->user->nama_sekolah }}</td>
                                        <td style="text-align:left;background-color:beige;">{{ $d->user->level->level_name ?? null }}</td>
                                        <td style="text-align:left;background-color:beige;">{{ $d->user->kelas->nama_kelas ?? null }}</td>
                                        <td style="text-align:left;background-color:beige;">{{ $d->user->provinsi ?? null }}</td>
                                        <td style="text-align:left;background-color:beige;">{{ $d->user->kabupaten ?? null }}</td>
                                        <td style="text-align:left;background-color:beige;">{{ $d->user->kecamatan ?? null }}</td>
                                        <td style="text-align:left;background-color:beige;">{{ $d->user->jenis_kelamin ?? null }}</td>
                                        <td style="text-align:left;background-color:beige;">{{ $d->user->agama ?? null }}</td>
                                        <td style="text-align:left;background-color:beige;">{{ $d->is_finish == 1 ? 'Selesai' : 'Progress' }}</td>
                                        <td>{{ $d->jumlah_benar }}</td>
                                        <td>{{ $d->jumlah_salah }}</td>
                                        <td>{{ $d->jumlah_lewat }}</td>
                                        <td>{{ $d->total_score }}</td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
