<div class="card">
    <div class="card-header">
        <h4>Tambah Hak Izin</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('app.permissions.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Nama Hak Akses</label>
                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Tuliskan Nama Hak Akses Lengkap">
                @error('name')
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