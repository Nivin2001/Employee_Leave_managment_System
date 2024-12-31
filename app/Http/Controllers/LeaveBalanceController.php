<?php

namespace App\Http\Controllers;

use App\Models\LeaveBalance;
use App\Models\LeaveType;
use App\Models\User;
use Illuminate\Http\Request;

class LeaveBalanceController extends Controller
{

    public function index()
    {
        $balances = LeaveBalance::with('leaveType')
            ->orderby('id')
            ->get()
            ->unique('leave_type_id'); // إزالة التكرار بعد جلب البيانات

        return view('LEMS.admin.leave-balance.index', compact('balances'));
    }



    public function create()
    {
        $leaveTypes=LeaveType::all();
        return view('LEMS.admin.leave-balance.create',compact('leaveTypes')); // تأكد من وجود هذا الملف
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'leave_type_id' => 'required|exists:leave_types,id',
        'leave_balance' => 'required|integer|min:0',
    ]);


    if (auth()->user()->type == 'admin') {
        $users = User::where('type', 'employee')->get();

        // التحقق إذا كان الرصيد موجودًا لنوع الإجازة المحدد
        foreach ($users as $user) {
            // التحقق إذا كان رصيد الإجازات موجودًا لهذا الموظف ونوع الإجازة
            $existingLeaveBalance = LeaveBalance::where('user_id', $user->id)
                ->where('leave_type_id', $request->leave_type_id)
                ->first();

            if ($existingLeaveBalance) {
                // إذا كان الرصيد موجودًا لهذا الموظف، نقوم بتحديثه
                $existingLeaveBalance->update([
                    'leave_balance' => $request->leave_balance
                ]);
            } else {
                // إذا لم يكن الرصيد موجودًا، نقوم بإضافته
                LeaveBalance::create([
                    'user_id' => $user->id,
                    'leave_type_id' => $request->leave_type_id,
                    'leave_balance' => $request->leave_balance,
                ]);
            }
        }
    }

    return redirect()->route('leave-balance.index')
        ->with('success', 'Leave balances created/updated successfully.');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
{
    $leaveBalance = LeaveBalance::with('leaveType')->findOrFail($id);

    return view('LEMS.admin.leave-balance.show', compact('leaveBalance'));
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $Balance=LeaveBalance::findorfail($id);
        $leaveTypes=LeaveType::all();
    return view('LEMS.admin.leave-balance.edit', compact('Balance', 'leaveTypes'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validated = $request->validate([
            'leave_type_id' => 'required|exists:leave_types,id',
            'leave_balance' => 'required|integer|min:0',
        ]);
        $leaveBalance=LeaveBalance::findOrFail($id);
        $leaveBalance->update([
            'leave_type_id' => $request->leave_type_id,
            'leave_balance' => $request->leave_balance,
        ]);
        return redirect()->route('leave-balance.index')
        ->with('success', 'Leave balance updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $leaveBalance=LeaveBalance::findOrFail($id);
        $leaveBalance->delete();
        return redirect()->route('leave-balance.index')
        ->with('success', 'Leave balance deleted successfully.');
    }
}
