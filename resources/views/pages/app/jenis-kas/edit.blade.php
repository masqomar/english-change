@extends('layouts.app')

@section('title', 'Edit Jenis Kas')

@push('style')
<!-- CSS Libraries -->
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Halaman Edit Jenis Kas</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Jenis Kas</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('app.jenis-kas.update', $jenisKas->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="nama">Nama Kas</label>
                                    <input type="text" id="nama" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ isset($jenisKas) ? $jenisKas->nama : old('nama') }}" placeholder="Tuliskan Nama Kas">
                                    @error('nama')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="pemasukan">Pemasukan</label>
                                    <select class="form-control @error('pemasukan') is-invalid @enderror" name="pemasukan" id="pemasukan" class="form-control">
                                        <option value="" selected>-- {{ __('Pilih Pemasukan') }} --</option>
                                        <option value="Y" {{ isset($jenisKas) && $jenisKas->pemasukan == 'Y' ? 'selected' : (old('pemasukan') == 'Y' ? 'selected' : '') }}>Tampil</option>
                                        <option value="N" {{ isset($jenisKas) && $jenisKas->pemasukan == 'N' ? 'selected' : (old('pemasukan') == 'N' ? 'selected' : '') }}>Tidak Tampil</option>
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
                                        <option value="Y" {{ isset($jenisKas) && $jenisKas->pengeluaran == 'Y' ? 'selected' : (old('pengeluaran') == 'Y' ? 'selected' : '') }}>Tampil</option>
                                        <option value="N" {{ isset($jenisKas) && $jenisKas->pengeluaran == 'N' ? 'selected' : (old('pengeluaran') == 'N' ? 'selected' : '') }}>Tidak Tampil</option>
                                    </select>
                                    @error('pengeluaran')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="transfer">transfer</label>
                                    <select class="form-control @error('transfer') is-invalid @enderror" name="transfer" id="transfer" class="form-control">
                                        <option value="" selected>-- {{ __('Pilih transfer') }} --</option>
                                        <option value="Y" {{ isset($jenisKas) && $jenisKas->transfer == 'Y' ? 'selected' : (old('transfer') == 'Y' ? 'selected' : '') }}>Tampil</option>
                                        <option value="N" {{ isset($jenisKas) && $jenisKas->transfer == 'N' ? 'selected' : (old('transfer') == 'N' ? 'selected' : '') }}>Tidak Tampil</option>
                                    </select>
                                    @error('transfer')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control @error('status') is-invalid @enderror" name="status" id="status" class="form-control">
                                        <option value="" selected disabled>-- {{ __('Pilih Status') }} --</option>
                                        <option value="1" {{ isset($jenisKas) && $jenisKas->status == '1' ? 'selected' : (old('status') == '1' ? 'selected' : '') }}>Aktif</option>
                                        <option value="0" {{ isset($jenisKas) && $jenisKas->status == '0' ? 'selected' : (old('status') == '0' ? 'selected' : '') }}>Tidak Aktif</option>
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
                                    <a href="{{ route('app.jenis-kas.index') }}" class="btn btn-sm btn-info">
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