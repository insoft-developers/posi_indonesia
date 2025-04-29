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
                        @foreach ($data as $d)
                            <table class="table table-striped table-bordered table-hover table-custom" style="width:100%">

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
                                        <th style="background-color:whitesmoke;font-weight:bold;">
                                            Sekolah/Universitas/Instansi</th>
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
                                    @foreach ($d->transaction as $index => $dc)
                                        @if ($dc->product_id !== null)
                                            <tr>
                                                <td style="background-color:beige;font-weight:bold;">{{ $index + 1 }}</td>
                                                <td style="background-color:beige;font-weight:bold;">{{ $dc->id }}</td>
                                                <td style="background-color:beige;font-weight:bold;">{{ date('d-m-Y H:i', strtotime($dc->created_at)) }}</td>
                                                <td style="background-color:beige;font-weight:bold;">{{ date('d-m-Y H:i', strtotime($d->payment_date)) }}</td>
                                                <td style="background-color:beige;font-weight:bold;">{{ $dc->userid }}</td>
                                                <td style="background-color:beige;font-weight:bold;">{{ $dc->tuser->name ?? null }}</td>
                                                <td style="background-color:beige;font-weight:bold;">{{ $dc->tuser->level->level_name ?? null }}</td>
                                                <td style="background-color:beige;font-weight:bold;">{{ $dc->tuser->district->province_name ?? null }}</td>
                                                <td style="background-color:beige;font-weight:bold;">{{ $dc->tuser->nama_sekolah ?? null }}</td>
                                                <td style="background-color:beige;font-weight:bold;">{{ $dc->competition->title ?? null }}</td>
                                                <td style="background-color:beige;font-weight:bold;">{{ $dc->session($dc->competition_id, $dc->study_id, $dc->userid)->medali ?? '-' }}
                                                </td>
                                                <td style="background-color:beige;font-weight:bold;">{{ $dc->session($dc->competition_id, $dc->study_id, $dc->userid)->total_score ?? 0 }}</td>
                                                <td style="background-color:beige;font-weight:bold;">{{ $dc->session($dc->competition_id, $dc->study_id, $dc->userid)->nilai ?? '-' }}</td>
                                                <td style="background-color:beige;font-weight:bold;">{{ $dc->product->product_name ?? null }}</td>
                                                <td style="background-color:beige;font-weight:bold;">{{ $dc->unit_price }}</td>
                                                <td style="background-color:beige;font-weight:bold;">{{ $dc->quantity }}</td>
                                                <td style="background-color:beige;font-weight:bold;">{{ $dc->amount }}</td>
                                                <td style="background-color:beige;font-weight:bold;">{{ $d->payment_status == 1 ? 'PAID' : 'NOT PAID' }}</td>
                                                <td style="background-color:beige;font-weight:bold;">{{ $d->delivery_cost }}</td>

                                            </tr>
                                            @if($dc->product->is_combo == 1)
                                                @php
                                                    $komposisi = explode(',', $dc->product->composition);
                                                @endphp
                                                @foreach($komposisi as $com)
                                                @php
                                                $single = \App\Models\Product::find($com);
                                                @endphp

                                                @if($single->is_fisik == 1)
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>{{ $dc->userid }}</td>
                                                    <td>{{ $dc->tuser->name ?? null }}</td>
                                                    <td>{{ $dc->tuser->level->level_name ?? null }}</td>
                                                    <td>{{ $dc->tuser->district->province_name ?? null }}</td>
                                                    <td>{{ $dc->tuser->nama_sekolah ?? null }}</td>
                                                    <td>{{ $dc->competition->title ?? null }}</td>
                                                    <td>{{ $dc->session($dc->competition_id, $dc->study_id, $dc->userid)->medali ?? '-' }}
                                                    </td>
                                                    <td>{{ $dc->session($dc->competition_id, $dc->study_id, $dc->userid)->total_score ?? 0 }}</td>
                                                    <td>{{ $dc->session($dc->competition_id, $dc->study_id, $dc->userid)->nilai ?? '-' }}</td>
                                                    <td>{{ $single->product_name ?? null }}</td>
                                                    <td></td>
                                                    <td>{{ $dc->quantity }}</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
    
                                                </tr>
                                                @endif
                                                @endforeach
                                            @endif


                                        @endif
                                    @endforeach
                                    <tr>
                                        <td colspan="16">Alamat Pengiriman: {{ $d->address }}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="16">Kurir: {{ $d->kurir }} - {{ $d->service }}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td style="background-color:whitesmoke;font-weight:bold;"></td>
                                        <td style="background-color:whitesmoke;font-weight:bold;"></td>
                                        <td style="background-color:whitesmoke;font-weight:bold;"></td>
                                        <td style="background-color:whitesmoke;font-weight:bold;"></td>
                                        <td style="background-color:whitesmoke;font-weight:bold;"></td>
                                        <td style="background-color:whitesmoke;font-weight:bold;"></td>
                                        <td style="background-color:whitesmoke;font-weight:bold;"></td>
                                        <td style="background-color:whitesmoke;font-weight:bold;"></td>
                                        <td style="background-color:whitesmoke;font-weight:bold;"></td>
                                        <td style="background-color:whitesmoke;font-weight:bold;"></td>
                                        <td style="background-color:whitesmoke;font-weight:bold;"></td>
                                        <td style="background-color:whitesmoke;font-weight:bold;"></td>
                                        <td style="background-color:whitesmoke;font-weight:bold;"></td>
                                        <td style="background-color:whitesmoke;font-weight:bold;"></td>
                                        <td style="background-color:whitesmoke;font-weight:bold;"></td>
                                        <td style="background-color:whitesmoke;font-weight:bold;">Total Belanja</td>
                                        <td style="background-color:whitesmoke;font-weight:bold;">{{ $d->grand_total }}</td>
                                        <td style="background-color:whitesmoke;font-weight:bold;"></td>
                                        <td style="background-color:whitesmoke;font-weight:bold;"></td>

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
