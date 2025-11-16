@extends('layouts.admin')

@section('content')
<div class="container">

    <h3 class="mb-4"><i class="fa fa-edit"></i> Edit User</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body">

            <form action="{{ route('users.update', $users->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Nama --}}
                <div class="mb-3">
                    <label class="form-label fw-bold">Nama</label>
                    <input type="text" name="name" value="{{ old('name', $users->name) }}"
                           class="form-control @error('name') is-invalid @enderror" required>
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- Email --}}
                <div class="mb-3">
                    <label class="form-label fw-bold">Email</label>
                    <input type="email" name="email" value="{{ old('email', $users->email) }}"
                           class="form-control @error('email') is-invalid @enderror" required>
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <hr>

                <h5 class="fw-bold">Ubah Password (Opsional)</h5>
                <small class="text-muted">Kosongkan bagian ini jika tidak ingin mengganti password.</small>

                {{-- Password Lama --}}
                <div class="mb-3 mt-2">
                    <label class="form-label fw-bold">Password Lama</label>
                    <div class="input-group">
                        <input type="password" name="old_password" id="old_password"
                               class="form-control @error('old_password') is-invalid @enderror">

                        <span class="input-group-text" onclick="togglePassword('old_password','old_icon')">
                            <i id="old_icon" class="fa fa-eye"></i>
                        </span>
                    </div>
                    @error('old_password') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                </div>

                {{-- Password Baru --}}
                <div class="mb-3">
                    <label class="form-label fw-bold">Password Baru</label>
                    <div class="input-group">
                        <input type="password" name="password" id="password"
                               class="form-control @error('password') is-invalid @enderror">

                        <span class="input-group-text" onclick="togglePassword('password','icon1')">
                            <i id="icon1" class="fa fa-eye"></i>
                        </span>
                    </div>
                    @error('password') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                </div>

                {{-- Konfirmasi Password --}}
                <div class="mb-3">
                    <label class="form-label fw-bold">Konfirmasi Password Baru</label>
                    <div class="input-group">
                        <input type="password" name="password_confirmation" id="password2"
                               class="form-control">

                        <span class="input-group-text" onclick="togglePassword('password2','icon2')">
                            <i id="icon2" class="fa fa-eye"></i>
                        </span>
                    </div>
                </div>

                <div class="d-flex m-3 mt-4">
                    <button class="btn btn-primary m-2">
                        <i class="fa fa-save"></i> Simpan
                    </button>
                    <a href="{{ route('users.index') }}" class="btn btn-secondary m-2">Kembali</a>
                </div>

            </form>

        </div>
    </div>

</div>


<script>
function togglePassword(id, icon) {
    const input = document.getElementById(id);
    const ic = document.getElementById(icon);

    if (input.type === "password") {
        input.type = "text";
        ic.classList.replace("fa-eye", "fa-eye-slash");
    } else {
        input.type = "password";
        ic.classList.replace("fa-eye-slash", "fa-eye");
    }
}
</script>

@endsection
