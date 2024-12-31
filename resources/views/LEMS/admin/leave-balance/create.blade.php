@extends('LEMS.admin.master')
@section('content')
    <div class="container">
        <h1>Add Leave Balance</h1>
        <form action="{{ route('leave-balance.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="leave_type">Leave Type</label>
                <select id="leave_type" name="leave_type_id" class="form-control" required>
                    <option value="">Select Leave Type</option>
                    @foreach($leaveTypes as $leaveType)
                        <option value="{{ $leaveType->id }}">{{ $leaveType->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="leave_balance">Balance</label>
                <input type="number" id="leave_balance" name="leave_balance" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
