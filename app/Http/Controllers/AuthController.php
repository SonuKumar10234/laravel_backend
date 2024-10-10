<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        // Find employee by email
        $employee = Employee::where('username', $request->username)->first();

        // If employee not found or password doesn't match
        if (!$employee || !Hash::check($request->password, $employee->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        return response()->json([
            'userId' => $employee->id,
            'userName' => $employee->employee_name,
            'role' => $employee->role,
        ]);
    }
}
