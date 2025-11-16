@extends('layouts.admin')

@section('content')
<div class="container">

    <h3 class="mb-4">
        <i class="fa fa-user-plus"></i> Tambah User Baru
    </h3>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body">

            <form action="{{ route('users.store') }}" method="POST">
                @csrf

                {{-- Nama --}}
                <div class="mb-3">
                    <label for="nama" class="form-label fw-bold">Nama</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                {{-- Email --}}
                <div class="mb-3">
                    <label for="email" class="form-label fw-bold">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="mb-3">
                <label class="form-label">Role</label>
                <select name="role" class="form-select text-dark" required>
                    <option value="admin">Admin</option>
                    <option value="guru">Guru</option>
                    <option value="petugas">Petugas</option>
                </select>
                </div>

                {{-- Password --}}
                <div class="mb-3">
                    <label class="form-label fw-bold">Password</label>
                    <div class="input-group">
                        <input type="password" name="password" id="password" class="form-control" required>
                        <span class="input-group-text" onclick="togglePassword('password', 'icon1')" style="cursor:pointer">
                            <i id="icon1" class="fa-solid fa-eye"></i>
                        </span>
                    </div>
                </div>

                {{-- Confirm Password --}}
                <div class="mb-3">
                    <label class="form-label fw-bold">Konfirmasi Password</label>
                    <div class="input-group">
                        <input type="password" name="password_confirmation" id="password2" class="form-control" required>
                        <span class="input-group-text" onclick="togglePassword('password2', 'icon2')" style="cursor:pointer">
                            <i id="icon2" class="fa-solid fa-eye"></i>
                        </span>
                    </div>
                </div>

                <button class="btn btn-primary">
                    <i class="fa fa-save"></i> Simpan
                </button>
                <a href="{{ route('users.index')}}" class="btn btn-secondary">kembali</a>

            </form>

        </div>
    </div>

</div>

{{-- Script Show / Hide Password --}}
<script>
function togglePassword(inputId, iconId) {
    const input = document.getElementById(inputId);
    const icon = document.getElementById(iconId);

    if (input.type === "password") {
        input.type = "text";
        icon.classList.replace("fa-eye", "fa-eye-slash");
    } else {
        input.type = "password";
        icon.classList.replace("fa-eye-slash", "fa-eye");
    }
}
</script>

@endsection
