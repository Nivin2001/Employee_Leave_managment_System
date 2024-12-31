
@extends('LEMS.admin.master')
@section('title', 'Create Employees')
@section('content')

    <div class="container">
        <h1>{{ $employees->name }} Details</h1>
        <div class="card mb-3">
            <div class="card-body ">
                <div class="row align-items-center">

                    <div class="col-md-3 ">
                            <img src="https://ui-avatars.com/api/?name={{ $employees->name }}" class="p-1"  style="border: 1px solid #ccc; width:100px;">
                    </div>

                    <div class="col-md-3">
                        <h5 class="card-title">{{ $employees->name }} (<small>{{ $employees->type }}</small>)
                        </h5>
                        <p class="card-text"><strong>Email:</strong> {{ $employees->email }}</p>

                    </div>
                </div>
            </div>
        </div>

        <a href="{{ route('employees.index') }}" class="btn btn-primary w-100">Back to List</a>
    </div>

@endsection
