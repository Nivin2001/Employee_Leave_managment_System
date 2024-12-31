
@extends('LEMS.admin.master')
@section('title', 'deny Requests')

@section('content')
<h2>Deny Leave Request</h2>

<form action="{{ route('leave-requests.deny.store', $leaveRequest->id) }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="reason">Denial Reason:</label>
        <textarea name="reason" id="reason" class="form-control" rows="4"></textarea>
    </div>

    <button type="submit" class="btn btn-outline-danger">Reject</button>
</form>
@endsection
