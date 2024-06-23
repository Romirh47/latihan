<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return response()->json(['employees' => $employees]);
    }

    public function show(Employee $employee)
    {
        return response()->json(['employee' => $employee]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:employees',
            'phone' => 'required|string|max:15',
            'gender' => 'required|string|in:male,female',
            'position' => 'required|string|max:255',
            'status' => 'required|string|in:kontrak,intern',
        ]);

        // Buat objek Employee baru dan simpan ke database
        $employee = Employee::create($validated);

        return response()->json([
            'message' => 'Employee created successfully!',
            'employee' => $employee
        ], 201);
    }


    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:employees,email,' . $employee->id,
            'phone' => 'required|string|max:15',
            'gender' => 'required|string|in:male,female',
            'position' => 'required|string|max:255',
            'status' => 'required|string|in:kontrak,intern',
        ]);

        // Update data pegawai dengan data yang divalidasi
        $employee->update($validated);

        return response()->json([
            'message' => 'Employee updated successfully!',
            'employee' => $employee
        ]);
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return response()->json(['message' => 'Employee deleted successfully.']);
    }
}
