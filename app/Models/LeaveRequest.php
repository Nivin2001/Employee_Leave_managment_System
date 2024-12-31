<?php

namespace App\Models;

use App\Models\User;
use App\Models\LeaveType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LeaveRequest extends Model
{
    use HasFactory;
    protected $fillable = ['user_id',
    'leave_type_id', 'start_date', 'end_date', 'days_requested', 'reason', 'status'];
    protected $dates = ['start_date', 'end_date',];


    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    public function scopeRejected($query)
    {
        return $query->where('status', 'rejected');
    }



    // public function isPending()
    // {
    //     return $this->status === 'pending';
    // }

    // public function isAnswered()
    // {
    //     return $this->status === 'approved' || $this->status === 'rejected';
    // }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function leaveType()
    {
        return $this->belongsTo(LeaveType::class);
    }
}
