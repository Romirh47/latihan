<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil data dari database
        $countEmployee = Employee::count(); // Menghitung total pegawai
        $countContractEmployees = Employee::where('status', 'kontrak')->count(); // Menghitung total pegawai kontrak
        $countInterns = Employee::where('status', 'intern')->count(); // Menghitung total intern
        $countMaleEmployees = Employee::where('gender', 'male')->count(); // Menghitung total pegawai laki-laki
        $countFemaleEmployees = Employee::where('gender', 'female')->count(); // Menghitung total pegawai perempuan

        return view('dashboard', [
            'countEmployee' => $countEmployee,
            'countContractEmployees' => $countContractEmployees,
            'countInterns' => $countInterns,
            'countMaleEmployees' => $countMaleEmployees,
            'countFemaleEmployees' => $countFemaleEmployees,
        ]);
    }
}
