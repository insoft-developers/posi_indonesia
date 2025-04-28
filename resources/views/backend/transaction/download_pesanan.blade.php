<!DOCTYPE html>
<html>

<head>
    <title>Daftar Pesanan</title>
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
                        @foreach($data as $d)
                        <table class="table table-striped table-bordered table-hover table-custom"
                            style="width:100%">
                            
                            <thead>
                                <tr>
                                    <th colspan="19">No Invoice : {{ $d->invoice }}</th>
                                </tr>
                                <tr>
                                    <th colspan="19">Penerima : {{ $d->receiver_name }}</th>
                                </tr>
                                <tr>
                                    <th colspan="19">No Hp : {{ $d->receiver_phone }}</th>
                                </tr>
                                <tr>
                                    <th style="background-color:whitesmoke;font-weight:bold;">No</th>
                                    <th style="background-color:whitesmoke;font-weight:bold;">Urutan Transaksi</th>
                                    <th style="background-color:whitesmoke;font-weight:bold;">Tgl Order</th>
                                    <th style="background-color:whitesmoke;font-weight:bold;">Tgl Bayar</th>
                                    <th style="background-color:whitesmoke;font-weight:bold;">User ID</th>
                                    <th style="background-color:whitesmoke;font-weight:bold;">Nama</th>
                                    <th style="background-color:whitesmoke;font-weight:bold;">Jenjang</th>
                                    <th style="background-color:whitesmoke;font-weight:bold;">Provinsi</th>
                                    <th style="background-color:whitesmoke;font-weight:bold;">Sekolah/Universitas/Instansi</th>
                                    <th style="background-color:whitesmoke;font-weight:bold;">Kompetisi</th>
                                    <th style="background-color:whitesmoke;font-weight:bold;">Medali</th>
                                    <th style="background-color:whitesmoke;font-weight:bold;">Nilai</th>
                                    <th style="background-color:whitesmoke;font-weight:bold;">Grade</th>
                                    <th style="background-color:whitesmoke;font-weight:bold;">Produk</th>
                                    <th style="background-color:whitesmoke;font-weight:bold;">Harga</th>
                                    <th style="background-color:whitesmoke;font-weight:bold;">Jumlah Pesanan</th>
                                    <th style="background-color:whitesmoke;font-weight:bold;">Total Harga</th>
                                    <th style="background-color:whitesmoke;font-weight:bold;">Status</th>
                                    <th style="background-color:whitesmoke;font-weight:bold;">Ongkir</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach($d->transaction as $index => $dc)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $dc->id }}</td>
                                        <td>{{ date('d-m-Y H:i', strtotime($dc->created_at)) }}</td>
                                        <td>{{ date('d-m-Y H:i', strtotime($d->payment_date)) }}</td>
                                        <td>{{ $dc->userid }}</td>
                                        <td>{{ $dc->tuser->name ?? null }}</td>
                                        <td>{{ $dc->tuser->level->level_name ?? null }}</td>
                                        <td>{{ $dc->tuser->district->province_name ?? null }}</td>
                                        <td>{{ $dc->tuser->nama_sekolah ?? null }}</td>
                                        <td>{{ $dc->competition->name ?? null }}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="16">Alamat : </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="16">Total Belanja : </td>
                                        <td>12.000</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                            </tbody>
                        </table>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
