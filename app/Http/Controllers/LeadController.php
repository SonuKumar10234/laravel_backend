<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\LeadLog;

class LeadController extends Controller
{
    public function getLeads()
    {
        $leads = Lead::with('assignedEmployee')->get();
        return $leads;
    }

    public function getLeadsByEmployee($employeeId)
    {
        // Fetch leads assigned to the employee with customer and employee details
        $leads = Lead::with(['assignedEmployee', 'customer'])
        ->where('assigned_to_emp', $employeeId)
        ->get();
        
        return response()->json($leads);
    }

    // Create a new lead
    public function createLead(Request $request)
    {
        // Create a new lead using all request data
        $lead = Lead::create($request->all());

        // Return the created lead as a response
        return response()->json(['message' => 'Lead created successfully'], 201);
    }

    public function updateLead(Request $request)
    {

        LeadLog::create($request->all());

        // Return the updated lead as a response
        return response()->json(['message' => 'Lead updated successfully'], 200);
    }

}
