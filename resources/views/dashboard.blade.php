@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-8 text-gray-900">Dashboard Pegawai</h1>

    <div class="row">
        <div class="col-12">
            <div class="row">
                @php
                    $totalEmployees = $countEmployee;
                    $contractPercentage = $totalEmployees ? round(($countContractEmployees / $totalEmployees) * 100, 2) : 0;
                    $internPercentage = $totalEmployees ? round(($countInterns / $totalEmployees) * 100, 2) : 0;
                    $malePercentage = $totalEmployees ? round(($countMaleEmployees / $totalEmployees) * 100, 2) : 0;
                    $femalePercentage = $totalEmployees ? round(($countFemaleEmployees / $totalEmployees) * 100, 2) : 0;
                @endphp

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
                                    <h5 class="text-white">{{ $contractPercentage }}%</h5>
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
                                    <h5 class="text-white">{{ $internPercentage }}%</h5>
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
                                    <h5 class="text-white">{{ $malePercentage }}%</h5>
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
                                    <h5 class="text-white">{{ $femalePercentage }}%</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card Bulat Statistik Pegawai -->
                <div class="col-lg-4">
                    <div class="card bg-dark">
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-6 mb-4">
                                <span class="round-48 d-flex align-items-center justify-content-center rounded-circle bg-secondary-subtle">
                                    <iconify-icon icon="fa-solid:chart-bar" class="fs-6 text-secondary"></iconify-icon>
                                </span>
                                <h6 class="mb-0 fs-4 text-white">Statistik Pegawai</h6>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <canvas id="employeeStatisticsChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Akhir Card Bulat Statistik Pegawai -->
            </div>
        </div>
    </div>

    <!-- Chart.js Library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var ctx = document.getElementById('employeeStatisticsChart').getContext('2d');
            var totalEmployees = {{ $countEmployee }};
            var chart = new Chart(ctx, {
                type: 'pie', // Tipe chart (pie, bar, line, dll.)
                data: {
                    labels: [
                        'Total Pegawai',
                        'Pegawai Kontrak',
                        'Intern',
                        'Laki-laki',
                        'Perempuan'
                    ],
                    datasets: [{
                        label: 'Statistik Pegawai',
                        data: [
                            {{ $countEmployee }},
                            {{ $countContractEmployees }},
                            {{ $countInterns }},
                            {{ $countMaleEmployees }},
                            {{ $countFemaleEmployees }}
                        ],
                        backgroundColor: [
                            '#FFD700',
                            '#FFA500',
                            '#FFC0CB',
                            '#00FF00',
                            '#FF69B4'
                        ],
                        borderColor: '#0F2C59',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: function (context) {
                                    var label = context.label || '';
                                    var value = context.raw || 0;
                                    var percentage = (value / totalEmployees * 100).toFixed(2);
                                    return label + ': ' + value + ' (' + percentage + '%)';
                                }
                            }
                        },
                        legend: {
                            display: true,
                            position: 'bottom',
                            labels: {
                                color: '#ffffff'
                            }
                        }
                    }
                }
            });
        });
    </script>
@endsection
