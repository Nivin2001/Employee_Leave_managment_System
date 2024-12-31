@extends('LEMS.employee.master')

@section('content')
<div class="container">
    <h2>Send a Message to Admin</h2>

    <!-- Display success message if available -->
    {{-- @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif --}}

    <!-- Message submission form -->
    <form action="{{ route('messages.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="message">Message Text:</label>
            <textarea name="message" id="message" class="form-control" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Send</button>
    </form>
</div>
@endsection
