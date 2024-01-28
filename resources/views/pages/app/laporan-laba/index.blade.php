@extends('layouts.app')

@section('title', 'Laporan Laba')

@push('style')
<!-- CSS Libraries -->
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Halaman Laporan Laba</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive p-1">
                                <h3> Pendapatan </h3>
                                <table class="table table-bordered">
                                    <tr>
                                        <th style="width:5%; vertical-align: middle; text-align:center; background-color: black"> No. </th>
                                        <th style="width:75%; vertical-align: middle; text-align:center; background-color: black">Keterangan </th>
                                        <th style="width:20%; vertical-align: middle; text-align:center; background-color: black"> Jumlah </th>
                                    </tr>
                                    @php
                                    $sum_total_pendapatan = 0;
                                    @endphp
                                    @foreach ($akunPendapatan as $pendapatan)
                                    @php
                                    $jumlahPendapatan = $pendapatan->total_akun_debet
                                    @endphp
                                    <tr>
                                        <td class="text-center"> {{$loop->iteration}} </td>
                                        <td>{{$pendapatan->nama_akun}}</td>
                                        <td style="text-align:right;">{{number_format($jumlahPendapatan)}}</td>
                                    </tr>
                                    @php
                                    $sum_total_pendapatan += $jumlahPendapatan;
                                    @endphp
                                    @endforeach
                                    <tr>
                                        <td colspan="2" style="text-align:right;"> <strong>Jumlah Pendapatan</strong></td>
                                        <td style="text-align:right;">{{number_format($sum_total_pendapatan)}}</td>
                                    </tr>
                                </table>
                                <h3> Biaya-biaya </h3>
                                <table class="table table-bordered">
                                    <tr>
                                        <th style="width:5%; vertical-align: middle; text-align:center; background-color: black"> No. </th>
                                        <th style="width:75%; vertical-align: middle; text-align:center; background-color: black">Keterangan </th>
                                        <th style="width:20%; vertical-align: middle; text-align:center; background-color: black"> Jumlah </th>
                                    </tr>
                                    @php
                                    $sum_total_biaya = 0;
                                    @endphp
                                    @foreach ($akunBiaya as $biaya)
                                    @php
                                    $jumlah = $biaya->total_biaya_debet
                                    @endphp
                                    <tr>
                                        <td class="text-center">{{$loop->iteration}}</td>
                                        <td>{{$biaya->nama_akun}}</td>
                                        <td style="text-align:right;">{{number_format($jumlah)}}</td>
                                    </tr>
                                    @php
                                    $sum_total_biaya += $jumlah;
                                    @endphp
                                    @endforeach
                                    <tr>
                                        <td colspan="2" style="text-align:right;"><strong> Jumlah Biaya</strong></td>
                                        <td style="text-align:right;">{{number_format($sum_total_biaya)}}</td>
                                    </tr>
                                </table>
                                <table width="100%">
                                    <tr style="background-color: #98FB98;">
                                        <td colspan="2" style="text-align:right;"> <strong>Laba Rugi </strong></td>
                                        <td style="text-align:right;"><strong>{{number_format($sum_total_pendapatan - $sum_total_biaya)}}</strong></td>
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