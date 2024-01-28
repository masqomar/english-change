@extends('layouts.app')

@section('title', 'Edit Kas Keluar')

@push('style')
<!-- CSS Libraries -->
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Halaman Edit Kas Keluar</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Kas Keluar</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('app.kas-keluar.update', $kasKeluar->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="tanggal_catat">Nama Kas</label>
                                    <input type="date" name="tanggal_catat" id="tanggal_catat" class="form-control @error('tanggal_catat') is-invalid @enderror" value="{{ isset($kasKeluar) && $kasKeluar->tanggal_catat ? $kasKeluar->tanggal_catat : old('tanggal_catat') }}" placeholder="{{ __('Tgl Catat') }}" required />
                                    @error('tanggal_catat')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="jumlah">{{ __('Jumlah') }}</label>
                                    <input type="number" name="jumlah" id="jumlah" class="form-control @error('jumlah') is-invalid @enderror" value="{{ isset($kasKeluar) ? $kasKeluar->jumlah : old('jumlah') }}" placeholder="{{ __('Jumlah') }}" required />
                                    @error('jumlah')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="keterangan">{{ __('Keterangan') }}</label>
                                    <input type="text" name="keterangan" id="keterangan" class="form-control @error('keterangan') is-invalid @enderror" value="{{ isset($kasKeluar) ? $kasKeluar->keterangan : old('keterangan') }}" placeholder="{{ __('Keterangan') }}" />
                                    @error('keterangan')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="nama_akun">{{ __('Dari Akun') }}</label>
                                    <select class="form-control @error('nama_akun') is-invalid @enderror" name="nama_akun" id="nama_akun">
                                        <option value="" selected disabled>-- {{ __('Pilih Akun') }} --</option>

                                        @foreach ($jenisAkun as $akun)
                                        <option value="{{ $akun->id }}" {{ isset($kasKeluar) && $kasKeluar->jenis_akun_id == $akun->id ? 'selected' : (old('jenis_akun_id') == $akun->id ? 'selected' : '') }}>
                                            {{ $akun->nama_akun }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('nama_akun')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="dari-kas-id">{{ __('Dari Kas') }}</label>
                                    <select class="form-control @error('untuk_kas_id') is-invalid @enderror" name="dari_kas_id" id="dari-kas-id">
                                        <option value="" selected disabled>-- {{ __('Pilih Kas') }} --</option>

                                        @foreach ($jenisKas as $kas)
                                        <option value="{{ $kas->id }}" {{ isset($kasKeluar) && $kasKeluar->dari_jenis_kas_id == $kas->id ? 'selected' : (old('dari_jenis_kas_id') == $kas->id ? 'selected' : '') }}>
                                            {{ $kas->nama }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('dari_kas_id')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>

                                <div class="text-right mt-3">
                                    <button class="btn btn-sm btn-primary" type="submit">
                                        <i class="fa fa-paper-plane"></i> Perbarui</button>
                                    <a href="{{ route('app.kas-keluar.index') }}" class="btn btn-sm btn-info">
                                        <i class="fa fa-arrow-back"></i> Kembali</a>
                                </div>
                            </form>
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