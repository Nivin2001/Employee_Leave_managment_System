<?php

namespace App\Models;

use App\Models\LeaveRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LeaveType extends Model
{
    use HasFactory;
    protected $fillable = ['title','description'];

    public function leaveRequests()
    {
        return $this->hasMany(LeaveRequest::class);
    }
    public function leaveBalances()
    {
        return $this->hasMany(LeaveBalance::class);
    }
}
