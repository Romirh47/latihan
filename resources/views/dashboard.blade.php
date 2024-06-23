@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card bg-dark">
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-6 mb-4">
                                <span class="round-48 d-flex align-items-center justify-content-center rounded bg-danger-subtle">
                                    <iconify-icon icon="fa-solid:users" class="fs-6 text-danger"></iconify-icon>
                                </span>
                                <h6 class="mb-0 fs-4 text-white">Total Pegawai</h6>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <h4 class="text-white" id="totalEmployees">{{ $countEmployee }} Orang</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card bg-dark">
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-6 mb-4">
                                <span class="round-48 d-flex align-items-center justify-content-center rounded bg-primary-subtle">
                                    <iconify-icon icon="fa-solid:user-friends" class="fs-6 text-primary"></iconify-icon>
                                </span>
                                <h6 class="mb-0 fs-4 text-white">Total Pegawai Kontrak</h6>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <h4 class="text-white" id="totalContractEmployees">{{ $countContractEmployees }} Orang</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card bg-dark">
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-6 mb-4">
                                <span class="round-48 d-flex align-items-center justify-content-center rounded bg-success-subtle">
                                    <iconify-icon icon="fa-solid:user-graduate" class="fs-6 text-success"></iconify-icon>
                                </span>
                                <h6 class="mb-0 fs-4 text-white">Total Intern</h6>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <h4 class="text-white" id="totalInterns">{{ $countInterns }} Orang</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card bg-dark">
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-6 mb-4">
                                <span class="round-48 d-flex align-items-center justify-content-center rounded bg-info-subtle">
                                    <iconify-icon icon="fa-solid:male" class="fs-6 text-info"></iconify-icon>
                                </span>
                                <h6 class="mb-0 fs-4 text-white">Total Laki-laki</h6>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <h4 class="text-white" id="totalMaleEmployees">{{ $countMaleEmployees }} Orang</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card bg-dark">
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-6 mb-4">
                                <span class="round-48 d-flex align-items-center justify-content-center rounded bg-warning-subtle">
                                    <iconify-icon icon="fa-solid:female" class="fs-6 text-warning"></iconify-icon>
                                </span>
                                <h6 class="mb-0 fs-4 text-white">Total Perempuan</h6>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <h4 class="text-white" id="totalFemaleEmployees">{{ $countFemaleEmployees }} Orang</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
