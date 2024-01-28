@extends('layouts.app')

@section('title', 'Edit Jenis Akun')

@push('style')
<!-- CSS Libraries -->
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Halaman Edit Jenis Akun</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Jenis Akun</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('app.jenis-akun.update', $jenisAkun->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="kode_akun">Kode Akun</label>
                                    <input type="text" id="kode_akun" class="form-control @error('kode_akun') is-invalid @enderror" name="kode_akun" value="{{ isset($jenisAkun) ? $jenisAkun->kode_akun : old('kode_akun') }}" placeholder="Tuliskan Kode Akun Lengkap">
                                    @error('kode_akun')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="nama_akun">Nama Akun</label>
                                    <input type="text" id="nama_akun" class="form-control @error('nama_akun') is-invalid @enderror" name="nama_akun" value="{{ isset($jenisAkun) ? $jenisAkun->nama_akun : old('nama_akun') }}" placeholder="Tuliskan Nama Akun">
                                    @error('nama_akun')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <select class="form-control @error('type') is-invalid @enderror" name="type" id="type" class="form-control">
                                        <option value="" selected>-- {{ __('Pilih Akun') }} --</option>
                                        <option value="Aktiva" {{ isset($jenisAkun) && $jenisAkun->type == 'Aktiva' ? 'selected' : (old('type') == 'Aktiva' ? 'selected' : '') }}>Aktiva</option>
                                        <option value="Pasiva" {{ isset($jenisAkun) && $jenisAkun->type == 'Pasiva' ? 'selected' : (old('type') == 'Pasiva' ? 'selected' : '') }}>Pasiva</option>
                                    </select>
                                    @error('type')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="laba_rugi">Laba Rugi</label>
                                    <select class="form-control @error('laba_rugi') is-invalid @enderror" name="laba_rugi" id="laba_rugi" class="form-control">
                                        <option value="" selected>-- {{ __('Pilih Laba Rugi') }} --</option>
                                        <option value="Pendapatan" {{ isset($jenisAkun) && $jenisAkun->laba_rugi == 'Pendapatan' ? 'selected' : (old('laba_rugi') == 'Pendapatan' ? 'selected' : '') }}>Pendapatan</option>
                                        <option value="Biaya" {{ isset($jenisAkun) && $jenisAkun->laba_rugi == 'Biaya' ? 'selected' : (old('laba_rugi') == 'Biaya' ? 'selected' : '') }}>Biaya</option>
                                    </select>
                                    @error('laba_rugi')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="pemasukan">Pemasukan</label>
                                    <select class="form-control @error('pemasukan') is-invalid @enderror" name="pemasukan" id="pemasukan" class="form-control">
                                        <option value="" selected>-- {{ __('Pilih Pemasukan') }} --</option>
                                        <option value="Y" {{ isset($jenisAkun) && $jenisAkun->pemasukan == 'Y' ? 'selected' : (old('pemasukan') == 'Y' ? 'selected' : '') }}>Tampil</option>
                                        <option value="N" {{ isset($jenisAkun) && $jenisAkun->pemasukan == 'N' ? 'selected' : (old('pemasukan') == 'N' ? 'selected' : '') }}>Tidak Tampil</option>
                                    </select>
                                    @error('pemasukan')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="pengeluaran">Pengeluaran</label>
                                    <select class="form-control @error('pengeluaran') is-invalid @enderror" name="pengeluaran" id="pengeluaran" class="form-control">
                                        <option value="" selected>-- {{ __('Pilih Pengeluaran') }} --</option>
                                        <option value="Y" {{ isset($jenisAkun) && $jenisAkun->pengeluaran == 'Y' ? 'selected' : (old('pengeluaran') == 'Y' ? 'selected' : '') }}>Tampil</option>
                                        <option value="N" {{ isset($jenisAkun) && $jenisAkun->pengeluaran == 'N' ? 'selected' : (old('pengeluaran') == 'N' ? 'selected' : '') }}>Tidak Tampil</option>
                                    </select>
                                    @error('pengeluaran')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control @error('status') is-invalid @enderror" name="status" id="status" class="form-control">
                                        <option value="" selected disabled>-- {{ __('Pilih Status') }} --</option>
                                        <option value="1" {{ isset($jenisAkun) && $jenisAkun->status == '1' ? 'selected' : (old('status') == '1' ? 'selected' : '') }}>Aktif</option>
                                        <option value="0" {{ isset($jenisAkun) && $jenisAkun->status == '0' ? 'selected' : (old('status') == '0' ? 'selected' : '') }}>Tidak Aktif</option>
                                    </select>
                                    @error('status')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="text-right mt-3">
                                    <button class="btn btn-sm btn-primary" type="submit">
                                        <i class="fa fa-paper-plane"></i> Perbarui</button>
                                    <a href="{{ route('app.jenis-akun.index') }}" class="btn btn-sm btn-info">
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