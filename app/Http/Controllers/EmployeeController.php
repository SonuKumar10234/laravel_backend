<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employee = Employee::all();
        return $employee;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validating the request data
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:employees,email',
            'username' => 'required|string|unique:employees,username',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }

        // password hashing before storing
        $hashedPassword = Hash::make($request->password);

        // Store the employee
        $employee = Employee::create([
            'employee_name' => $request->employee_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'designation' => $request->designation,
            'role' => 'employee',
            'supervisor' => $request->supervisor,
            'username' => $request->username,
            'password' => $hashedPassword,
        ]);

        return response()->json(['message' => 'Employee created successfully'], 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        // Finding the employee by ID
        $employee = Employee::findOrFail($id);

        // Updating the employee's fields
        $employee->employee_name = $request->employee_name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->address = $request->address;
        $employee->designation = $request->designation;
        $employee->supervisor = $request->supervisor;
        $employee->username = $request->username;

        // If password is provided, hash it and update
        if ($request->filled('password')) {
            $employee->password = Hash::make($request->password);
        }

        // Saving in database
        $employee->save();

        return response()->json(['message' => 'Employee updated successfully'], 200);

    }

}
