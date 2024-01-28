<div class="card">
    <div class="card-header">
        <h4>Tambah Jenis Akun</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('app.jenis-akun.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="kode_akun">Kode Akun</label>
                <input type="text" id="kode_akun" class="form-control @error('kode_akun') is-invalid @enderror" name="kode_akun" placeholder="Tuliskan Kode Akun Lengkap">
                @error('kode_akun')
                <div class="invalid-feedback" style="display: block">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="nama_akun">Nama Akun</label>
                <input type="text" id="nama_akun" class="form-control @error('nama_akun') is-invalid @enderror" name="nama_akun" placeholder="Tuliskan Nama Akun">
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
                    <option value="Aktiva">Aktiva</option>
                    <option value="Pasiva">Pasiva</option>
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
                    <option value="Pendapatan">Pendapatan</option>
                    <option value="Biaya">Biaya</option>
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
                    <option value="Y">Tampil</option>
                    <option value="N">Tidak Tampil</option>
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
                    <option value="Y">Tampil</option>
                    <option value="N">Tidak Tampil</option>
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
                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>
                </select>
                @error('status')
                <div class="invalid-feedback" style="display: block">
                    {{ $message }}
                </div>
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