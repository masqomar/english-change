@extends('layouts.app')

@section('title', 'Edit Kas Transfer')

@push('style')
<!-- CSS Libraries -->
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Halaman Edit Kas Transfer</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Kas Transfer</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('app.kas-transfer.update', $kasTransfer->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="tanggal_catat">Nama Kas</label>
                                    <input type="date" name="tanggal_catat" id="tanggal_catat" class="form-control @error('tanggal_catat') is-invalid @enderror" value="{{ isset($kasTransfer) && $kasTransfer->tanggal_catat ? $kasTransfer->tanggal_catat : old('tanggal_catat') }}" placeholder="{{ __('Tgl Catat') }}" required />
                                    @error('tanggal_catat')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="jumlah">{{ __('Jumlah') }}</label>
                                    <input type="number" name="jumlah" id="jumlah" class="form-control @error('jumlah') is-invalid @enderror" value="{{ isset($kasTransfer) ? $kasTransfer->jumlah : old('jumlah') }}" placeholder="{{ __('Jumlah') }}" required />
                                    @error('jumlah')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="keterangan">{{ __('Keterangan') }}</label>
                                    <input type="text" name="keterangan" id="keterangan" class="form-control @error('keterangan') is-invalid @enderror" value="{{ isset($kasTransfer) ? $kasTransfer->keterangan : old('keterangan') }}" placeholder="{{ __('Keterangan') }}" />
                                    @error('keterangan')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="dari-kas-id">{{ __('Dari Kas') }}</label>
                                    <select class="form-control @error('dari_kas_id') is-invalid @enderror" name="dari_kas_id" id="dari-kas-id">
                                        <option value="" selected disabled>-- {{ __('Pilih Kas') }} --</option>

                                        @foreach ($jenisKas as $kas)
                                        <option value="{{ $kas->id }}" {{ isset($kasTransfer) && $kasTransfer->dari_jenis_kas_id == $kas->id ? 'selected' : (old('dari_jenis_kas_id') == $kas->id ? 'selected' : '') }}>
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

                                <div class="form-group">
                                    <label for="untuk-kas-id">{{ __('Untuk Kas') }}</label>
                                    <select class="form-control @error('untuk_kas_id') is-invalid @enderror" name="untuk_kas_id" id="untuk-kas-id">
                                        <option value="" selected disabled>-- {{ __('Pilih Kas') }} --</option>

                                        @foreach ($jenisKas as $kas)
                                        <option value="{{ $kas->id }}" {{ isset($kasTransfer) && $kasTransfer->untuk_jenis_kas_id == $kas->id ? 'selected' : (old('untuk_jenis_kas_id') == $kas->id ? 'selected' : '') }}>
                                            {{ $kas->nama }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('untuk_kas_id')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>

                                <div class="text-right mt-3">
                                    <button class="btn btn-sm btn-primary" type="submit">
                                        <i class="fa fa-paper-plane"></i> Perbarui</button>
                                    <a href="{{ route('app.kas-transfer.index') }}" class="btn btn-sm btn-info">
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