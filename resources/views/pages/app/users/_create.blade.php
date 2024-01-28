<div class="card">
    <div class="card-header">
        <h4>Tambah Pengguna</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('app.users.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror"
                    name="name" placeholder="Tuliskan Nama Lengkap">
                @error('name')
                    <div class="invalid-feedback" style="display: block">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="username">Nama Pengguna</label>
                <input type="text" id="username" class="form-control @error('username') is-invalid @enderror"
                    name="username" placeholder="Tuliskan Nama Pengguna">
                @error('username')
                    <div class="invalid-feedback" style="display: block">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Alamat E-Mail</label>
                <input type="email" id="email" class="form-control @error('email') is-invalid @enderror"
                    name="email" placeholder="Tuliskan E-Mail">
                @error('email')
                    <div class="invalid-feedback" style="display: block">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label class="fw-bold">Password</label>
                <input class="form-control" name="password" type="password" placeholder="Tuliskan Password"
                    value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror">
                @error('password')
                    <div class="invalid-feedback" style="display: block">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label class="fw-bold">Konfirmasi Password</label>
                <input class="form-control" name="password_confirmation" type="password"
                    placeholder="Konfirmasi Password" value="{{ old('password_confirmation') }}">
            </div>
            <div class="form-group">
                <div class="mb-3">
                    <label class="fw-bold">Hak Akses</label>
                    <br>
                    @foreach ($roles as $role)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="roles[]" value="{{ $role->name }}"
                                id="check-{{ $role->id }}"
                                {{ in_array($role->name, old('roles', [])) ? 'checked' : '' }}>
                            <label class="form-check-label"
                                for="check-{{ $role->id }}">{{ $role->name }}</label>
                        </div>
                    @endforeach
                </div>
                @if ($errors->has('roles'))
                    <div class="alert alert-danger">
                        {{ $errors->first('roles') }}
                    </div>
                @endif
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
