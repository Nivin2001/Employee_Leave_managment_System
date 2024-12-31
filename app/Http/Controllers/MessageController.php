<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    //
    public function create()
    {
        return view('LEMS.employee.messages.create');
    }
    public function store(Request $request)
{
    $request->validate([
        'message' => 'required|string|max:500',  // نص الرسالة يجب أن يكون غير فارغ وأقل من 500 حرف
    ]);


    Message::create([
        'user_id' => auth()->id(),
        'message' => $request->message,
        'status' => 'unread',
    ]);


    return redirect()->route('leave-requests.index')->with('success', 'تم إرسال الرسالة بنجاح!');
}




}
