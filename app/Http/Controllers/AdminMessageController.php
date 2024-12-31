<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class AdminMessageController extends Controller
{
    //
    public function index()
    {
        $messages = Message::where('status', 'unread')->get();
        return view('LEMS.admin.master', compact('messages'));
    }
    public function markAsRead($id)
    {
        $message=Message::findORFail($id);
        $message->update(['status' =>'read']);
        return redirect()->back()->with('success');
    }
}
