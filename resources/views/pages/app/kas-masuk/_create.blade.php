<div class="card">
    <div class="card-header">
        <h4>Tambah Kas Masuk</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('app.kas-masuk.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="tanggal_catat">Nama Kas</label>
                <input type="date" name="tanggal_catat" id="tanggal_catat" class="form-control @error('tanggal_catat') is-invalid @enderror" placeholder="{{ __('Tgl Catat') }}" required />
                @error('tanggal_catat')
                <div class="invalid-feedback" style="display: block">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="jumlah">{{ __('Jumlah') }}</label>
                <input type="number" name="jumlah" id="jumlah" class="form-control @error('jumlah') is-invalid @enderror" placeholder="{{ __('Jumlah') }}" required />
                @error('jumlah')
                <span class="text-danger">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="keterangan">{{ __('Keterangan') }}</label>
                <input type="text" name="keterangan" id="keterangan" class="form-control @error('keterangan') is-invalid @enderror" placeholder="{{ __('Keterangan') }}" />
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
                    <option value="{{ $akun->id }}">{{ $akun->nama_akun }}</option>
                    @endforeach
                </select>
                @error('nama_akun')
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
                    <option value="{{ $kas->id }}">{{ $kas->nama }}</option>
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
                    <i class="fa fa-paper-plane"></i> Submit</button>
                <button class="btn btn-sm btn-warning" type="reset">
                    <i class="fa fa-redo"></i> Reset</button>
            </div>
        </form>
    </div>
</div>