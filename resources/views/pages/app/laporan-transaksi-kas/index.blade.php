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
                            <div class="table-responsive">
                                <table class="table table-bordered table-m">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="width: 5%">No</th>
                                            <th scope="col">Kode Transaksi</th>
                                            <th scope="col">Tanggal Transaksi</th>
                                            <th scope="col">Jenis Transaksi</th>
                                            <th scope="col">Dari Kas</th>
                                            <th scope="col">Untuk Kas</th>
                                            <th scope="col">Debet</th>
                                            <th scope="col">Kredit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transaksiKas as $no => $kas)
                                        <tr>
                                            <th scope="row">
                                                {{ ++$no + ($transaksiKas->currentPage() - 1) * $transaksiKas->perPage() }}
                                            </th>
                                            <td>{{ $kas->kode_transaksi }}</td>
                                            <td>{{ \Carbon\Carbon::parse($kas->tanggal_catat)->format('d/m/Y')}}</td>
                                            <td>{{ $kas->nama_akun }}</td>
                                            <td>{{ $kas->nama_dari_kas }}</td>
                                            <td>{{ $kas->nama_untuk_kas }}</td>                                          
                                            @if ($kas->nama_untuk_kas === NULL)
                                            <td>0</td>
                                            @else
                                            <td>{{ number_format($kas->jumlah) }}</td>
                                            @endif
                                            @if ($kas->nama_dari_kas === NULL)
                                            <td>0</td>
                                            @else
                                            <td>{{ number_format($kas->jumlah) }}</td>
                                            @endif
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer pull-right">
                            {{ $transaksiKas->links('vendor.pagination.bootstrap-4') }}
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