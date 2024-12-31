{{--  @extends('LEMS.master')
@section('title', 'approve Requests')

@section('content')
<h2>Approve Leave Request</h2>

<form action="{{ route('leave-requests.approve.store', $leaveRequest->id) }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-success">Approve</button>
</form>
@endsection  --}}
