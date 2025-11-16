@extends('layouts.admin')

@section('content')

<!-- MDI ICONS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Manajemen Akun</h3>

        <!-- Tombol Tambah Akun -->
        <a href="{{ route('users.create') }}" class="btn btn-primary shadow-sm">
            <i class="mdi mdi-account-plus"></i> Tambah Akun
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success shadow-sm">{{ session('success') }}</div>
    @endif


    <div class="card shadow-sm">
        <div class="card-body p-0">

            <table class="table table-bordered table-striped mb-0">
                <thead class="table-primary text-white">
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th width="120px">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ ucfirst($user->role) }}</td>

                        <td>
                            <span class="badge bg-{{ $user->is_active ? 'success':'danger' }}">
                                {{ $user->is_active ? 'Aktif':'Nonaktif' }}
                            </span>
                        </td>

                        <td class="text-center">


                            <!-- Lihat Detail -->
                            <button class="btn btn-sm btn-info shadow-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#modalDetail{{ $user->id }}">
                                <i class="fa fa-eye"></i>
                            </button>

                            <!-- Edit -->
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning shadow-sm">
                                <i class="fa fa-pencil"></i>
                            </a>

                            <!-- Toggle Status -->
                            <form action="{{ route('users.toggleStatus', $user->id) }}"
                                method="POST"
                                style="display:inline">
                                @csrf
                                @method('PATCH')

                                <button class="btn btn-sm {{ $user->is_active ? 'btn-secondary' : 'btn-success' }} shadow-sm"
                                        onclick="return confirm('Ubah status akun ini?')">

                                    @if($user->is_active)
                                        <i class="fa fa-ban"></i> <!-- Nonaktifkan -->
                                    @else
                                        <i class="fa fa-check"></i> <!-- Aktifkan -->
                                    @endif

                                </button>
                            </form>


                            <!-- Hapus -->
                            <form action="{{ route('users.destroy', $user->id) }}"
                                  method="POST"
                                  style="display:inline">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-sm btn-danger shadow-sm"
                                        onclick="return confirm('Hapus akun ini?')">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>

                        </td>
                    </tr>


                    <!-- ========================== -->
                    <!-- Modal Detail -->
                    <!-- ========================== -->
                    <div class="modal fade" id="modalDetail{{ $user->id }}" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content shadow">

                                <div class="modal-header bg-primary text-white">
                                    <h5 class="modal-title">Detail Akun</h5>
                                    <button data-bs-dismiss="modal" class="btn-close"></button>
                                </div>

                                <div class="modal-body">

                                    <p><strong>Nama:</strong> {{ $user->name }}</p>
                                    <p><strong>Email:</strong> {{ $user->email }}</p>
                                    <p><strong>Role:</strong> {{ ucfirst($user->role) }}</p>

                                    <p><strong>Status:</strong>
                                        <span class="badge bg-{{ $user->is_active ? 'success':'danger' }}">
                                            {{ $user->is_active ? 'Aktif':'Nonaktif' }}
                                        </span>
                                    </p>

                                    {{-- <p class="text-danger mt-3">
                                        <strong>Password:</strong>
                                        Password tidak dapat ditampilkan karena sudah terenkripsi.
                                    </p> --}}

                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- END MODAL -->

                    @endforeach
                </tbody>

            </table>

        </div>
    </div>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@endsection
