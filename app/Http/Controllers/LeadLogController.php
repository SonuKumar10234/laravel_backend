<?php

namespace App\Http\Controllers;

use App\Models\LeadLog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LeadLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getLeadLogs()
    {
        $leadLogs = LeadLog::all();
        return $leadLogs;
    }


}
