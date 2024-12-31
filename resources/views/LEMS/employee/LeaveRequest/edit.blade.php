@extends('LEMS.employee.master')
@section('title', 'Edit Leave Request')

@section('style')
    h1{
    color: #53455c ;
    }
@endsection
@section('content')
    <div class="container my-4">
        <h1 class="text-center mb-3">Edit Leave Request</h1>
        @include('LEMS.flash_erroe')
        @include('LEMS.flash_action')
        <form action="{{ route('leave-requests.update', $leaveRequest->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="leave_type_id">Leave Type</label>
                <select name="leave_type_id" id="leave_type_id"
                    class="form-control @error('leave_type_id') is-invalid @enderror">
                    <option value="">Select Leave Type</option>
                    @foreach ($leaveTypes as $leaveType)
                        <option value="{{ $leaveType->id }}"
                            {{ $leaveRequest->leave_type_id == $leaveType->id ? 'selected' : '' }}>
                            {{ $leaveType->title }}
                        </option>
                    @endforeach
                </select>
                @error('leave_type_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="start_date">Start Date</label>
                <input type="date" name="start_date" id="start_date"
                    class="form-control @error('start_date') is-invalid @enderror"
                    value="{{ old('start_date', $leaveRequest->start_date) }}">
                @error('start_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="end_date">End Date</label>
                <input type="date" name="end_date" id="end_date"
                    class="form-control @error('end_date') is-invalid @enderror"
                    value="{{ old('end_date', $leaveRequest->end_date) }}">
                @error('end_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn w-100 text-white rounded-pill py-2 submit-btn"
                style="background-color: #53455c">Update Request</button>
        </form>
    </div>
@endsection
