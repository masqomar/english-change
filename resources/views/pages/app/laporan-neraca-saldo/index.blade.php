@extends('layouts.app')

@section('title', 'Laporan Transaksi Kas')

@push('style')
<!-- CSS Libraries -->
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Halaman Laporan Transaksi Kas</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive p-1">
                                <table class="table table-striped" id="myTable" width="100%">
                                    <tr>
                                        <th style="text-align:center; width:5%"> </th>
                                        <th style="text-align:center; width:55%"> Nama Akun</th>
                                        <th style="text-align:center; width:20%"> Debet </th>
                                        <th style="text-align:center; width:20%"> Kredit </th>
                                    </tr>
                                    <tr>
                                        <td> &nbsp; <i class="nav-icon fas fa-folder-open"></i> </td>
                                        <td><strong> A. Aktiva Lancar </strong></td>
                                    </tr>
                                    @php
                                    $total = 0;
                                    $total_kas_semua = 0;
                                    @endphp
                                    @foreach ($saldo as $data)
                                    <tr>
                                        <td></td>
                                        <td>A{{ $data['kas_id'] }}. {{ $data['kas_nama'] }}</td>
                                        <td style="text-align: right;">{{ number_format($data['sisaSaldo']) }}</td>
                                        <td style="text-align: right;"> 0 </td>
                                    </tr>
                                    @php
                                    $total_kas_semua = $total += $data['sisaSaldo'];
                                    @endphp
                                    @endforeach

                                    @php
                                    $total_aktifa = 0;
                                    $total_pasiva = 0;
                                    $total_aktifa_akun = 0;
                                    $total_pasiva_akun = 0;
                                    @endphp

                                    @foreach($jenisAkun as $akun)
                                    @php
                                    $transaksiDebet = DB::table('transaksi_kas')->where('jenis_akun_id', $akun->id)->where('dk', 'D')->sum('jumlah');
                                    $transaksiKredit = DB::table('transaksi_kas')->where('jenis_akun_id', $akun->id)->where('dk', 'K')->sum('jumlah');
                                    @endphp
                                    <tr>
                                        @if (strlen($akun->kode_akun) != 1)
                                        <td> &nbsp; </td>
                                        <td>{{$akun->kode_akun}}. {{$akun->nama_akun}}</td>
                                        @else
                                        <td class="text-center"> &nbsp; <i class="nav-icon fas fa-folder-open"></i> </td>
                                        <td> <strong>{{$akun->kode_akun}}. {{$akun->nama_akun}}</strong></td>
                                        @endif

                                        @if ($akun->type == 'Aktiva')
                                        <td style="text-align: right;">{{number_format ($transaksiKredit - $transaksiDebet)}}</td>
                                        <td style="text-align: right;">0</td>
                                        @php
                                        $saldoAktifa = $transaksiKredit - $transaksiDebet;
                                        $total_aktifa_akun = $total_aktifa += $saldoAktifa;
                                        @endphp
                                        @endif

                                        @if ($akun->type == 'Pasiva')
                                        <td style="text-align: right;">0</td>
                                        <td style="text-align: right;">{{number_format ($transaksiDebet - $transaksiKredit)}}</td>
                                        @php
                                        $saldoPasiva = $transaksiDebet - $transaksiKredit;
                                        $total_pasiva_akun = $total_pasiva += $saldoPasiva;
                                        @endphp
                                        @endif
                                    </tr>
                                    @endforeach

                                    <tr>
                                        <td colspan="2" style="text-align: center;"><strong> JUMLAH KUABEH</td>
                                        <td style="text-align: right;"><strong>{{number_format($total_kas_semua + $total_aktifa_akun)}}</strong></td>
                                        <td style="text-align: right;"><strong>{{number_format($total_pasiva_akun)}}</strong></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<!-- JS Libraies -->
<!-- Page Specific JS File -->
@endpush