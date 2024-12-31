<?php

namespace App\Http\Controllers;

use App\Models\LeaveBalance;
use App\Models\LeaveRequest;
use App\Models\User;
use App\Notifications\LeaveRequestStatusChanged;
use App\Notifications\LeaveRequestSubmitted;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LeaveRequestAdminController extends Controller
{

    public function index(Request $request)
    {
        $status = $request->query('status', null); // إذا لم يتم تحديد حالة، ستكون القيمة null

        $leaveRequests = LeaveRequest::with('user', 'leaveType')
            ->when($status, function ($query) use ($status) {
                return $query->where('status', $status);
            })
            ->orderBy('id', 'DESC')
            ->paginate(6);

        return view('LEMS.admin.leaveRequests.index', compact('leaveRequests'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'leave_type' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'status' => 'required',
        ]);

        $validated['user_id'] = auth()->id(); // Add the authenticated user's ID

        $leaveRequest = LeaveRequest::create($validated);
        return redirect()->route('leave-requests.index')
            ->with('success', 'Leave request submitted successfully.');
    }



    public function pending()
    {

        $leaveRequests = LeaveRequest::with('user', 'leaveType')
            ->where('status', 'pending')
            ->orderBy('id', 'DESC')
            ->paginate(6);

        return view('LEMS.admin.leaveRequests.index', compact('leaveRequests'));
    }


    public function approved()
    {


        $leaveRequests = LeaveRequest::with('user', 'leaveType')
            ->where('status', 'approved')
            ->orderBy('id', 'DESC')
            ->paginate(6);

        return view('LEMS.admin.leaveRequests.index', compact('leaveRequests'));
    }


    public function rejected()
    {

        $leaveRequests = LeaveRequest::with('user', 'leaveType')
            ->where('status', 'rejected')
            ->orderBy('id', 'DESC')
            ->paginate(6);

        return view('LEMS.admin.leaveRequests.index', compact('leaveRequests'));
    }

    // صفحة رفض الطلب
    public function deny($id)
    {

        $leaveRequest = LeaveRequest::findOrFail($id);
        return view('LEMS.admin.leaveRequests.deny', compact('leaveRequest'));
    }

    public function storeApproval($id)
    {
        $leaveRequest = LeaveRequest::findOrFail($id);
        $leaveRequest->update(['status' => 'approved']);
        $userLeaveBalance = LeaveBalance::where('user_id', $leaveRequest->user_id)
            ->where('leave_type_id', $leaveRequest->leave_type_id)
            ->first();

        if ($userLeaveBalance && $userLeaveBalance->leave_balance >= $leaveRequest->days_requested) {
            $userLeaveBalance->leave_balance -= $leaveRequest->days_requested;
            $userLeaveBalance->save();
        } else {
            return redirect()->route('admin.leave-requests.index')
                ->with('msg', 'Insufficient leave balance.')
                ->with('type', 'danger');
        }

        $leaveRequest->user->notify(new LeaveRequestStatusChanged($leaveRequest));

        return redirect()->route('admin.leave-requests.index')->with('success', 'Leave request approved.');
    }



    public function storeDenial(Request $request, $id)
    {
        $leaveRequest = LeaveRequest::findOrFail($id);
        $leaveRequest->update([
            'status' => 'rejected',
            'reason' => $request->input('reason'),
        ]);
    $leaveRequest->user->notify(new LeaveRequestStatusChanged($leaveRequest));

        return redirect()->route('admin.leave-requests.index')->with('success', 'Leave request denied.');
    }
}
