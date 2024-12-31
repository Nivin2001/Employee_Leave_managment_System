
@extends('LEMS.admin.master')
@section('title', 'View Department')
@section('content')
    <div class="container">
        <h1>Department Details</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $department->name }}</h5>
                <p class="card-text">{{ $department->description ?? 'No description available.' }}</p>
                <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-warning">Edit</a>
                <a href="{{ route('departments.index') }}" class="btn btn-secondary">Back to Departments</a>
            </div>
        </div>
    </div>
@endsection
