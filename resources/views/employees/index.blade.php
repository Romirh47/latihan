@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Pegawai</h1>
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addEmployeeModal">Tambah Pegawai</button>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>NO</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Position</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1; // Variable untuk nomor urut
            @endphp
            @foreach ($employees as $employee)
                <tr>
                    <td>{{ $no++ }}</td> <!-- Menggunakan variable $no untuk nomor urut -->
                    <td>{{ $employee->nama }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->phone }}</td>
                    <td>{{ $employee->gender }}</td>
                    <td>{{ $employee->position }}</td>
                    <td>{{ $employee->status }}</td>
                    <td>
                        <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#detailEmployeeModal-{{ $employee->id }}" title="Detail">
                            <i class="bi bi-eye"></i> <!-- Bootstrap Icons untuk simbol view -->
                        </button>

                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editEmployeeModal-{{ $employee->id }}" title="Edit">
                            <i class="bi bi-pencil"></i> <!-- Bootstrap Icons untuk simbol pensil -->
                        </button>

                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteEmployeeModal-{{ $employee->id }}" title="Hapus">
                            <i class="bi bi-trash"></i> <!-- Bootstrap Icons untuk simbol tong sampah -->
                        </button>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Add Employee Modal -->
<div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="addEmployeeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addEmployeeModalLabel">Tambah Pegawai</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('employees.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama lengkap" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan alamat email" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
                        <input type="tel" pattern="[0-9]{10,14}" class="form-control" id="phone" name="phone" placeholder="Masukkan nomor telepon" required>
                        <div class="form-text">Masukkan nomor telepon antara 10 hingga 14 digit.</div>
                    </div>

                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender <span class="text-danger">*</span></label>
                        <select class="form-select" id="gender" name="gender" required>
                            <option value="">Pilih gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="position" class="form-label">Position <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="position" name="position" placeholder="Masukkan posisi" required>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="">Pilih status</option>
                            <option value="kontrak">Kontrak</option>
                            <option value="intern">Intern</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Detail Employee Modal -->
@foreach ($employees as $employee)
    <div class="modal fade" id="detailEmployeeModal-{{ $employee->id }}" tabindex="-1" aria-labelledby="detailEmployeeModalLabel-{{ $employee->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailEmployeeModalLabel-{{ $employee->id }}">Detail Pegawai</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Nama:</strong> {{ $employee->nama }}</p>
                    <p><strong>Email:</strong> {{ $employee->email }}</p>
                    <p><strong>Phone:</strong> {{ $employee->phone }}</p>
                    <p><strong>Gender:</strong> {{ $employee->gender }}</p>
                    <p><strong>Position:</strong> {{ $employee->position }}</p>
                    <p><strong>Status:</strong> {{ $employee->status }}</p>
                </div>
            </div>
        </div>
    </div>
@endforeach

<!-- Edit Employee Modal -->
@foreach ($employees as $employee)
    <div class="modal fade" id="editEmployeeModal-{{ $employee->id }}" tabindex="-1" aria-labelledby="editEmployeeModalLabel-{{ $employee->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editEmployeeModalLabel-{{ $employee->id }}">Edit Pegawai</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="nama-{{ $employee->id }}" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama-{{ $employee->id }}" name="nama" value="{{ $employee->nama }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="email-{{ $employee->id }}" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email-{{ $employee->id }}" name="email" value="{{ $employee->email }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone-{{ $employee->id }}" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone-{{ $employee->id }}" name="phone" value="{{ $employee->phone }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="gender-{{ $employee->id }}" class="form-label">Gender</label>
                            <select class="form-select" id="gender-{{ $employee->id }}" name="gender" required>
                                <option value="male" {{ $employee->gender == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ $employee->gender == 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="position-{{ $employee->id }}" class="form-label">Position</label>
                            <input type="text" class="form-control" id="position-{{ $employee->id }}" name="position" value="{{ $employee->position }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="status-{{ $employee->id }}" class="form-label">Status</label>
                            <select class="form-select" id="status-{{ $employee->id }}" name="status" required>
                                <option value="kontrak" {{ $employee->status == 'kontrak' ? 'selected' : '' }}>Kontrak</option>
                                <option value="intern" {{ $employee->status == 'intern' ? 'selected' : '' }}>Intern</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach

<!-- Delete Employee Modal -->
@foreach ($employees as $employee)
    <div class="modal fade" id="deleteEmployeeModal-{{ $employee->id }}" tabindex="-1" aria-labelledby="deleteEmployeeModalLabel-{{ $employee->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteEmployeeModalLabel-{{ $employee->id }}">Hapus Pegawai</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus pegawai ini?</p>
                    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach


@endsection
