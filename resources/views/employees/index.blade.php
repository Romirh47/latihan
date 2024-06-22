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
                <th>ID</th>
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
            @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee->id }}</td>
                    <td>{{ $employee->nama }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->phone }}</td>
                    <td>{{ $employee->gender }}</td>
                    <td>{{ $employee->position }}</td>
                    <td>{{ $employee->status }}</td>
                    <td>
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editEmployeeModal-{{ $employee->id }}">Edit</button>
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteEmployeeModal-{{ $employee->id }}">Hapus</button>
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
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select" id="gender" name="gender" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="position" class="form-label">Position</label>
                        <input type="text" class="form-control" id="position" name="position" required>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="kontrak">Kontrak</option>
                            <option value="intern">Intern</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

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
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach

@endsection
