@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100 bg-dark">
                <div class="card-body">
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEmployee">
                            <i class="ti ti-plus fs-6"></i>
                            Tambah Pegawai
                        </button>
                    </div>
                    <table class="table table-striped table-dark" id="tableEmployee">
                        <thead>
                            <tr>
                                <th>No</th>
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
                            <tr>
                                <td colspan="8">Masih dalam proses Pengambilan data, Loading...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah -->
    <div class="modal fade" id="addEmployee" tabindex="-1" aria-labelledby="addEmployeeLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <form class="modal-content" action="{{ route('api.employees.store') }}" id="formAddEmployee" method="POST">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addEmployeeLabel">Tambah Pegawai</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">No Hp <span class="text-danger">*</span></label>
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="No Hp"
                            pattern="^08\d{8,11}$" required>
                        <div class="form-text">Masukkan nomor telepon yang valid (misalnya 08123456789).</div>
                        <div class="invalid-feedback">
                            Masukkan nomor telepon yang valid (misalnya 08123456789).
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender <span class="text-danger">*</span></label>
                        <select class="form-control" id="gender" name="gender" required>
                            <option value="">Pilih Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="position" class="form-label">Jabatan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="position" name="position" placeholder="Jabatan"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="">Pilih Status</option>
                            <option value="kontrak">Kontrak</option>
                            <option value="intern">Intern</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    {{-- end modal tambah --}}



    <!-- Modal Edit -->
    <div class="modal fade" id="editEmployee" tabindex="-1" aria-labelledby="editEmployeeLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <form class="modal-content" action="{{ route('api.employees.update', 'employeeId') }}" id="formEditEmployee">
                @csrf
                @method('PUT')
                <input type="hidden" name="id">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editEmployeeLabel">Edit Pegawai</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Nama Lengkap" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">No Hp</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="No Hp"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-control" id="gender" name="gender" required>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="position" class="form-label">Jabatan</label>
                        <input type="text" class="form-control" id="position" name="position" placeholder="Jabatan"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="intern">Intern</option>
                            <option value="kontrak">Kontrak</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    {{-- end modal edit --}}

    <!-- Modal Detail -->
    <div class="modal fade" id="previewEmployee" tabindex="-1" aria-labelledby="previewEmployeeLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="previewEmployeeLabel">Detail Pegawai</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Nama Lengkap" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">No Hp</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="No Hp"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <input type="text" class="form-control" id="gender" name="gender" placeholder="Gender"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Alamat"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="position" class="form-label">Jabatan</label>
                        <input type="text" class="form-control" id="position" name="position" placeholder="Jabatan"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <input type="text" class="form-control" id="status" name="status" placeholder="Status"
                            readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal detail --}}
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {

            // Reset form saat modal 'Tambah Pegawai' ditutup
            $('#addEmployee').on('hidden.bs.modal', function() {
                $(this).find('form')[0].reset();
                $(this).find('form').removeClass('was-validated');
            });

            // Event submit untuk form 'Tambah Pegawai'
            $('#formAddEmployee').submit(function(e) {
                e.preventDefault();
                let form = $(this);

                if (form[0].checkValidity() === false) {
                    e.stopPropagation();
                    form.addClass('was-validated');
                } else {
                    $.ajax({
                        url: form.attr('action'),
                        method: 'POST',
                        data: form.serialize(),
                        success: function(response) {
                            Swal.fire({
                                title: "Berhasil!",
                                text: response.message,
                                icon: "success"
                            });
                            $('#addEmployee').modal('hide');
                            getEmployee();
                        },
                        error: function(xhr) {
                            Swal.fire({
                                title: "Gagal!",
                                text: xhr.responseJSON.message,
                                icon: "error"
                            });
                        }
                    });
                }
            });

            // Event submit untuk form 'Edit Pegawai'
            $('#formEditEmployee').submit(function(e) {
                e.preventDefault();
                let form = $(this);
                let url = form.attr('action').replace('employeeId', form.find('input[name="id"]').val());

                $.ajax({
                    url: url,
                    method: 'PUT',
                    data: form.serialize(),
                    beforeSend: function() {
                        Swal.fire({
                            title: 'Loading',
                            html: 'Mohon tunggu sebentar',
                            allowOutsideClick: false,
                            showConfirmButton: false,
                            willOpen: () => {
                                Swal.showLoading();
                            }
                        });
                    },
                    success: function(response) {
                        Swal.fire({
                            title: "Berhasil!",
                            text: response.message,
                            icon: "success"
                        });
                        $('#editEmployee').modal('hide');
                        getEmployee();
                    },
                    error: function(xhr) {
                        Swal.fire({
                            title: "Gagal!",
                            text: xhr.responseJSON.message,
                            icon: "error"
                        });
                    }
                });
            });

            // Event untuk tombol 'Hapus'
            $(document).on('click', '.btn-hapus', function() {
                let id = $(this).data('id');

                Swal.fire({
                    title: 'Apakah Anda Yakin?',
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        let url = "{{ route('api.employees.destroy', 'id') }}";
                        url = url.replace('id', id);

                        $.ajax({
                            url: url,
                            method: 'DELETE',
                            success: function(response) {
                                Swal.fire({
                                    title: "Berhasil!",
                                    text: response.message,
                                    icon: "success"
                                });
                                getEmployee();
                            },
                            error: function(xhr) {
                                Swal.fire({
                                    title: "Gagal!",
                                    text: xhr.responseJSON.message,
                                    icon: "error"
                                });
                            }
                        });
                    }
                });
            });

            // Event untuk tombol 'Ubah'
            $(document).on('click', '.btn-ubah', function() {
                let id = $(this).data('id');
                let url = "{{ route('api.employees.show', 'employeeId') }}";
                url = url.replace('employeeId', id);

                $.ajax({
                    url: url,
                    method: 'GET',
                    beforeSend: function() {
                        Swal.fire({
                            title: 'Loading',
                            html: 'Mohon tunggu sebentar',
                            allowOutsideClick: false,
                            showConfirmButton: false,
                            willOpen: () => {
                                Swal.showLoading();
                            }
                        });
                    },
                    success: function(response) {
                        Swal.close();
                        let form = $('#editEmployee form');
                        form.find('input[name="id"]').val(response.employee.id);
                        form.find('input[name="name"]').val(response.employee.name);
                        form.find('input[name="email"]').val(response.employee.email);
                        form.find('input[name="phone"]').val(response.employee.phone);
                        form.find('select[name="gender"]').val(response.employee.gender);
                        form.find('input[name="position"]').val(response.employee.position);
                        form.find('select[name="status"]').val(response.employee.status);
                        $('#editEmployee').modal('show');
                    },
                    error: function(xhr) {
                        Swal.fire({
                            title: "Gagal!",
                            text: xhr.responseJSON.message,
                            icon: "error"
                        });
                    }
                });
            });

            // Event untuk tombol 'Detail'
            $(document).on('click', '.btn-preview', function() {
                let id = $(this).data('id');
                let url = "{{ route('api.employees.show', 'employeeId') }}";
                url = url.replace('employeeId', id);

                $.ajax({
                    url: url,
                    method: 'GET',
                    beforeSend: function() {
                        Swal.fire({
                            title: 'Loading',
                            html: 'Mohon tunggu sebentar',
                            allowOutsideClick: false,
                            showConfirmButton: false,
                            willOpen: () => {
                                Swal.showLoading();
                            }
                        });
                    },
                    success: function(response) {
                        Swal.close();
                        let modal = $('#previewEmployee');
                        modal.find('input[name="name"]').val(response.employee.name);
                        modal.find('input[name="email"]').val(response.employee.email);
                        modal.find('input[name="phone"]').val(response.employee.phone);
                        modal.find('input[name="gender"]').val(response.employee.gender);
                        modal.find('input[name="position"]').val(response.employee.position);
                        modal.find('input[name="status"]').val(response.employee.status);
                        $('#previewEmployee').modal('show');
                    },
                    error: function(xhr) {
                        Swal.fire({
                            title: "Gagal!",
                            text: xhr.responseJSON.message,
                            icon: "error"
                        });
                    }
                });
            });

            // Fungsi untuk mengambil daftar pegawai
            function getEmployee() {
                $.ajax({
                    url: "{{ route('api.employees.index') }}",
                    method: 'GET',
                    success: function(response) {
                        let tbody = $('#tableEmployee tbody');
                        tbody.empty();
                        $.each(response.employees, function(index, employee) {
                            let row = `
                                <tr>
                                    <td>${index + 1}</td>
                                    <td>${employee.name}</td>
                                    <td>${employee.email}</td>
                                    <td>${employee.phone}</td>
                                    <td>${employee.gender}</td>
                                    <td>${employee.position}</td>
                                    <td>${employee.status}</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-preview" data-id="${employee.id}">Detail</button>
                                        <button type="button" class="btn btn-warning btn-ubah" data-id="${employee.id}">Ubah</button>
                                        <button type="button" class="btn btn-danger btn-hapus" data-id="${employee.id}">Hapus</button>
                                    </td>
                                </tr>
                            `;
                            tbody.append(row);
                        });
                    },
                    error: function(xhr) {
                        Swal.fire({
                            title: "Gagal!",
                            text: xhr.responseJSON.message,
                            icon: "error"
                        });
                    }
                });
            }

            // Panggil fungsi untuk mengambil daftar pegawai saat halaman dimuat
            getEmployee();

        });
    </script>
@endpush

