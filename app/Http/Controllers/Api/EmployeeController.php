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
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'phone' => 'required|regex:/^08\d{8,11}$/',
            'gender' => 'required|in:Laki - laki,Perempuan',
            'position' => 'required|string|max:255',
            'status' => 'required|in:kontrak,intern',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
        }

        $employee = Employee::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'position' => $request->position,
            'status' => $request->status,
            'photo' => $photoPath
        ]);

        return response()->json([
            'message' => 'Pegawai berhasil ditambahkan',
            'employee' => $employee
        ], 201);
    }



    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:employees,email,' . $employee->id,
            'phone' => 'required|string|max:15',
            'gender' => 'required|string|in:Laki - laki,Perempuan',
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

    public function getEmployees(Request $request)
    {
        if ($request->ajax()) {
            $employees = Employee::query();

            // Memproses pencarian jika ada
            if ($request->filled('search')) {
                $search = $request->search;
                $employees->where(function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%')
                        ->orWhere('email', 'like', '%' . $search . '%')
                        ->orWhere('phone', 'like', '%' . $search . '%')
                        ->orWhere('gender', 'like', '%' . $search . '%')
                        ->orWhere('position', 'like', '%' . $search . '%')
                        ->orWhere('status', 'like', '%' . $search . '%');
                });
            }

            // Mengambil data dengan DataTables
            return Datatables::of($employees)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    // Tambahkan kode untuk tombol aksi (edit, delete)
                })
                ->editColumn('photo', function ($row) {
                    // Tambahkan kode untuk menampilkan foto
                })
                ->rawColumns(['action', 'photo'])
                ->make(true);
        }

        return abort(404);
    }
}
