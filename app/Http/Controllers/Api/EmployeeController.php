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
            'nama' => 'required',
            'email' => 'required|email|unique:employees,email',
            'phone' => 'required|numeric',
            'gender' => 'required|in:male', 'female',
            'position' => 'required',
            'status' => 'required|in:kontrak', 'intern',
        ]);

        $employee = Employee::create($validated);

        return response()->json(['message' => 'Employee created successfully.', 'employee' => $employee]);
    }

    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
           'nama' => 'required',
            'email' => 'required|email|unique:employees,email',
            'phone' => 'required|numeric',
            'gender' => 'required|in:male', 'female',
            'position' => 'required',
            'status' => 'required|in:kontrak', 'intern',
        ]);

        $employee->update($validated);

        return response()->json(['message' => 'Employee updated successfully.', 'employee' => $employee]);
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return response()->json(['message' => 'Employee deleted successfully.']);
    }
}
