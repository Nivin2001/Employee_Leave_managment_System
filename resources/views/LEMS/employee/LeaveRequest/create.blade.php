

@extends('LEMS.employee.master')

@section('title', 'Submit Request')

@section('style')
<style>
footer {
    background-color: #343a40;
    color: white;
    text-align: center;
    padding: 20px 0;
    position: relative;
    bottom: 0;
    width: 100%;
}

footer p {
    margin: 0;
    font-size: 14px;
}


</style>
@endsection

@section('content')

    <div class="container">
        <div class="row align-items-center justify-content-around">
            <div class="col-md-5">
                <div>
                    <h3> Employee Leave </h3>
                    <h3>Management System</h3>
                </div>

                @include('LEMS.flash_action')
                <form action="{{ route('leave-requests.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="leave_type_id">Leave Type</label>
                        <select name="leave_type_id" id="leave_type_id"
                            class="form-control py-2 @error('leave_type_id') is-invalid @enderror">
                            <option value="">Select Leave Type</option>
                            @foreach ($leaveTypes as $leaveType)
                                <option value="{{ $leaveType->id }}">{{ $leaveType->title }}</option>
                            @endforeach
                        </select>
                        @error('leave_type_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="start_date">From Date :</label>
                        <input type="date" name="start_date" id="start_date"
                            class="form-control py-2 @error('start_date') is-invalid @enderror"
                            value="{{ old('start_date') }}">
                        @error('start_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="end_date">To Date :</label>
                        <input type="date" name="end_date" id="end_date"
                            class="form-control py-2 @error('end_date') is-invalid @enderror" value="{{ old('end_date') }}">
                        @error('end_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <button type="submit" class="btn w-100 text-white rounded-pill py-2 submit-btn"
                        style="background-color: #53455c">Submit</button>
                </form>
            </div>

            <div class="col-md-6">
                <img class="img-fluid " src="{{ asset('employeeassets/leave.jpg') }}" alt="">
            </div>
        </div>
    </div>



@endsection
