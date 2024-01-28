<div class="card">
    <div class="card-header">
        <h4>Tambah Kas Transfer</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('app.kas-transfer.store') }}" method="POST">
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
                <label for="dari-kas-id">{{ __('Dari Kas') }}</label>
                <select class="form-control @error('dari_kas_id') is-invalid @enderror" name="dari_kas_id" id="dari-kas-id">
                    <option value="" selected disabled>-- {{ __('Pilih Kas') }} --</option>

                    @foreach ($jenisKas as $kas)
                    <option value="{{ $kas->id }}">{{ $kas->nama }}</option>
                    @endforeach
                </select>
                @error('dari_kas_id')
                <span class="text-danger">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="untuk_kas_id">{{ __('Untuk Kas') }}</label>
                <select class="form-control @error('untuk_kas_id') is-invalid @enderror" name="untuk_kas_id" id="untuk_kas_id">
                    <option value="" selected disabled>-- {{ __('Pilih Akun') }} --</option>

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