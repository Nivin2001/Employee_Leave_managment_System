@extends('LEMS.admin.master')

@section('content')
    <div class="container">
        <h1>Leave Balance Details</h1>
        <table class="table">
            <tr>
                <th>Leave Type</th>
                <td>{{ $leaveBalance->leaveType->title }}</td>
            </tr>
            <tr>
                <th>Balance</th>
                <td>{{ $leaveBalance->leave_balance }}</td>
            </tr>
            <tr>
                <td colspan="2">
                    <a href="{{ route('leave-balance.index') }}" class="btn btn-secondary">Back to List</a>
                </td>
            </tr>
        </table>
    </div>
@endsection
