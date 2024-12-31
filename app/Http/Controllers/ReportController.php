<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    //

    public function showReport()
    {

        $pending = LeaveRequest::where('status', 'pending')->count();
        $approved = LeaveRequest::where('status', 'approved')->count();
        $rejected = LeaveRequest::where('status', 'rejected')->count();

        $data = [
            'pending' => $pending,
            'approved' => $approved,
            'rejected' => $rejected
        ];

        return view('LEMS.admin.report.index', compact('data',));


    }

    }

