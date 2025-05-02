<!DOCTYPE html>
<html>

<head>
    <title>Form Pendaftaran</title>
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
                                    <th style="background-color:whitesmoke;font-weight:bold;">ID</th>
                                    <th style="background-color:whitesmoke;font-weight:bold;">Nama</th>
                                    <th style="background-color:whitesmoke;font-weight:bold;">Email</th>
                                    <th style="background-color:whitesmoke;font-weight:bold;">Nomor HP</th>
                                    <th style="background-color:whitesmoke;font-weight:bold;">Jenjang</th>
                                    <th style="background-color:whitesmoke;font-weight:bold;">Sekolah</th>
                                    <th style="background-color:whitesmoke;font-weight:bold;">Kecamatan</th>
                                    <th style="background-color:whitesmoke;font-weight:bold;">Kabupaten</th>
                                    <th style="background-color:whitesmoke;font-weight:bold;">Provinsi</th>
                                    <th style="background-color:whitesmoke;font-weight:bold;">Event</th>
                                    <th style="background-color:whitesmoke;font-weight:bold;">Bidang</th>
                                    <th style="background-color:whitesmoke;font-weight:bold;">Jenis Kelamin</th>
                                    <th style="background-color:whitesmoke;font-weight:bold;">Kelas</th>
                                    <th style="background-color:whitesmoke;font-weight:bold;">Agama</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $index => $d)
                                    @php
                                        $bidangs = [];
                                        $transaksi = \App\Models\Transaction::with('invoices')
                                            ->where('userid', $d->id)
                                            ->whereNull('product_id')
                                            ->whereHas('invoices', function ($q) {
                                                $q->where('payment_status', 1);
                                            })
                                            ->get();
                                        
                                        foreach ($transaksi as $t) {
                                            $bidang = $t->study->pelajaran->name ?? null;
                                            array_push($bidangs, $bidang);
                                        }

                                        $bs = implode(",", $bidangs);

                                    @endphp
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $d->name }}</td>
                                        <td>{{ $d->email }}</td>
                                        <td>{{ $d->whatsapp }}</td>
                                        <td>
                                            {{ $d->level->level_name ?? null }}</td>
                                        <td>{{ $d->nama_sekolah }}</td>
                                        <td>
                                            {{ $d->district->district_name ?? null }}</td>
                                        <td>
                                            {{ $d->district->regency_name ?? null }}</td>
                                        <td>
                                            {{ $d->district->province_name ?? null }}</td>
                                        <td>{{ $com->title }}</td>
                                        <td>{{ $bs }}</td>
                                        <td>{{ $d->jenis_kelamin }}
                                        </td>
                                        <td>
                                            {{ $d->kelas->nama_kelas ?? null }}</td>
                                        <td>{{ $d->agama }}</td>

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
