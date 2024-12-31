<?php

namespace App\Http\Controllers;

use App\Models\LeaveBalance;
use App\Models\LeaveType;
use App\Models\LeaveRequest;
use App\Models\User;
use App\Notifications\LeaveRequestSubmitted;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LeaveRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $leaveRequests = LeaveRequest::with('leaveType')
            ->where('user_id', $user_id)
            ->orderByDesc('id')
            ->paginate(3);

        return view('LEMS.employee.LeaveRequest.index', compact('leaveRequests'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user_id = auth()->user()->id;
        $leaveTypes = LeaveType::all();
        $leaveRequests = LeaveRequest::with('leaveType')
            ->where('user_id', $user_id)
            ->orderByDesc('id')
            ->get();
        return view('LEMS.employee.LeaveRequest.create', compact('leaveRequests', 'leaveTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_id = auth()->user()->id;
        $validated = $request->validate([
            'leave_type_id' => 'required|exists:leave_types,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $startDate = Carbon::parse($validated['start_date'])->format('Y-m-d');
        $endDate = Carbon::parse($validated['end_date'])->format('Y-m-d');
        $daysRequested = Carbon::parse($endDate)->diffInDays($startDate) + 1;
        $validated['user_id'] = $user_id;
        $validated['days_requested'] = $daysRequested;
        $validated['status'] = 'pending';
        $validated['start_date'] = $startDate;
        $validated['end_date'] = $endDate;
        $leaveRequest = LeaveRequest::create($validated);

        $admins = User::where('type', 'admin')->get();
        foreach ($admins as $admin) {
            $admin->notify(new LeaveRequestSubmitted($leaveRequest));
        }

        return redirect()->route('leave-requests.index')
            ->with('msg', 'Leave Request Submitted Successfully')
            ->with('type', 'success');
    }




    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
    // app/Http/Controllers/LeaveRequestController.php

    public function leaveHistory()
    {
        $user_id = auth()->id();


        $leaveBalances = LeaveBalance::where('user_id', $user_id)->get();


        $leaveRequests = LeaveRequest::where('user_id', $user_id)->get();


        $totalLeaveRequestsPending = LeaveRequest::where('user_id', $user_id)
                                                ->where('status', 'pending')
                                                ->count();
        $totalLeaveRequestsAccepted = LeaveRequest::where('user_id', $user_id)
                                                  ->where('status', 'approved')
                                                  ->count();
        $totalLeaveRequestsRejected = LeaveRequest::where('user_id', $user_id)
                                                  ->where('status', 'rejected')
                                                  ->count();


        return view('LEMS.employee.LeaveRequest.show', compact(
            'leaveRequests',
            'leaveBalances',
            'totalLeaveRequestsPending',
            'totalLeaveRequestsAccepted',
            'totalLeaveRequestsRejected'
        ));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user_id = auth()->user()->id;
        $leaveRequest = LeaveRequest::where('user_id', $user_id)
            ->findOrFail($id);
        $leaveTypes = LeaveType::all();
        return view('LEMS.employee.LeaveRequest.edit', compact('leaveRequest', 'leaveTypes'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user_id = auth()->user()->id;

    $validated=$request->validate([
            'leave_type_id' => 'required|exists:leave_types,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            // 'reason' => 'required|string',
        ]);

        $leaveRequest = LeaveRequest::where('user_id', $user_id)
            ->findOrFail($id);

        $leaveRequest->update($validated);
        return redirect()->route('leave-requests.index')
            ->with('msg', 'Leave Request Updated Successfully')
            ->with('type', 'success');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user_id = auth()->user()->id;
        $leaveRequest = LeaveRequest::where('user_id', $user_id)
            ->findOrFail($id);
        $leaveRequest->delete();
        return redirect()->route('leave-requests.index')
            ->with('msg', 'Leave Request Deleted Successfully')
            ->with('type', 'success');
    }
}
