<?php
function getStatusColor($status)
{
    switch ($status) {
        case 'approved':
            return 'green';
        case 'rejected':
            return 'red';
        default:
            return 'orange';
    }
}
?>


@extends('LEMS.admin.master')
@section('title', 'Leave Requests')

@section('content')
    <h3 class="text-center my-4 fw-4">Employee Leave Requests</h3>

    <!-- روابط التنقل بين الحالات -->
    <div class="mb-4">
        <a href="{{ route('admin.leave-requests.pending') }}" class="btn btn-warning">Pending</a>
        <a href="{{ route('admin.leave-requests.approved') }}" class="btn btn-success">Approved</a>
        <a href="{{ route('admin.leave-requests.rejected') }}" class="btn btn-danger">Rejected</a>
    </div>

    <!-- جدول عرض الطلبات -->
    <div class="table-responsive">
        <table class="table table-bordered bg-white p-3">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Employee ID</th>
                    <th>Leave Type</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Applied On</th>
                    <th>Status</th>
                    <th>Actions</th>
                    <th>Reasons</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($leaveRequests as $index => $leaveRequest)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $leaveRequest->user->name }}</td>
                        <td>{{ $leaveRequest->user->id }}</td>
                        <td>{{ $leaveRequest->leaveType->title }}</td>
                        <td>{{ $leaveRequest->start_date }}</td>
                        <td>{{ $leaveRequest->end_date }}</td>
                        <td>{{ $leaveRequest->created_at }}</td>
                        <td style="color: {{ getStatusColor($leaveRequest->status) }}">{{ ucFirst($leaveRequest->status) }}</td>
                        <td>
                            @if ($leaveRequest->status === 'pending')
                                <div class="d-flex">
                                    <form action="{{ route('leave-requests.approve.store', $leaveRequest->id) }}" method="POST" class="mx-1">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-success">
                                            <i class="fa-solid fa-check-double"></i>
                                        </button>
                                    </form>
                                    <a href="{{ route('leave-requests.deny', $leaveRequest->id) }}" class="btn btn-sm btn-outline-danger">
                                        <i class="fa-solid fa-xmark"></i>
                                    </a>
                                </div>
                            @elseif ($leaveRequest->status === 'approved' || $leaveRequest->status === 'rejected')
                                Answered
                            @endif
                        </td>
                        <td>{{ $leaveRequest->reason }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $leaveRequests->links() }}
@endsection
