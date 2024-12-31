@extends('LEMS.employee.master')
@section('content')
<div class="container mt-4">

    <!-- إحصائيات الإجازات -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card shadow-sm bg-warning text-white">
                <div class="card-body text-center">
                    <h5 class="card-title">Pending Requests</h5>
                    <p class="card-text">{{ $totalLeaveRequestsPending }} Pending Leave Requests</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm bg-success text-white">
                <div class="card-body text-center">
                    <h5 class="card-title">Approved Requests</h5>
                    <p class="card-text">{{ $totalLeaveRequestsAccepted }} Approved Leave Requests</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm bg-danger text-white">
                <div class="card-body text-center">
                    <h5 class="card-title">Declined Requests</h5>
                    <p class="card-text">{{ $totalLeaveRequestsRejected }} Declined Leave Requests</p>
                </div>
            </div>
        </div>
    </div>

    <!-- أرصدة الإجازات -->
    <div class="row mb-4">
        @foreach($leaveBalances as $balance)
            <div class="col-md-4">
                <div class="card shadow-sm bg-info text-white">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $balance->leaveType->title }} Leave Balance</h5>
                        <p class="card-text">You have {{ $balance->leave_balance }} days remaining</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- جدول تاريخ الإجازات -->
    <h2 class="mt-5 text-center text-secondary">Leave History</h2>
    <div class="table-responsive mt-3">
        <table class="table table-hover table-striped align-middle">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Leave Type</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Requested At</th>
                    <th>Reason (If Rejected)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($leaveRequests as $leaveRequest)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $leaveRequest->leaveType->title }}</td>
                        <td>{{ $leaveRequest->start_date }}</td>
                        <td>{{ $leaveRequest->end_date }}</td>
                        <td>
                            <span class="badge
                                @if($leaveRequest->status == 'approved') badge-success
                                @elseif($leaveRequest->status == 'rejected') badge-danger
                                @else badge-warning @endif">
                                {{ ucfirst($leaveRequest->status) }}
                            </span>
                        </td>
                        <td>{{ $leaveRequest->created_at->diffForHumans() }}</td>
                        <td>
                            @if($leaveRequest->status === 'rejected')
                                {{ $leaveRequest->reason }}
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

