<div class="card">
    <div class="card-header">
        <h4>Tambah Jenis Kas</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('app.jenis-kas.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nama">Nama Kas</label>
                <input type="text" id="nama" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Tuliskan Nama Kas Lengkap">
                @error('nama')
                <div class="invalid-feedback" style="display: block">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="transfer">Transfer</label>
                <select class="form-control @error('transfer') is-invalid @enderror" name="transfer" id="transfer" class="form-control">
                    <option value="" selected>-- {{ __('Pilih Transfer') }} --</option>
                    <option value="Y">Tampil</option>
                    <option value="N">Tidak Tampil</option>
                </select>
                @error('transfer')
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