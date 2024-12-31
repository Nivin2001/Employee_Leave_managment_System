
@extends('LEMS.admin.master')
@section('title', 'Add Employees')
@section('content')

<div class="text-center">
    <h3>Add Employee</h3>
</div>
<form action="{{ route('employees.store') }}" method="POST">
    @csrf
    <div class="form-floating mb-3">
        <label for="name"  class="col-sm-3 col-form-label text-start">Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name">
        @error('name')
        <small class="invalid-feedback">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-floating mb-3">
        <label for="email"  class="col-sm-3 col-form-label text-start">Email</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Your email" >
        @error('email')
        <small class="invalid-feedback">{{ $message }}</small>
        @enderror
    </div>


    <!-- Gender Field -->
    <div class="form-floating mb-3">
        <label for="gender" class="col-sm-3 col-form-label text-start">Gender</label>
            <select class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender">
                <option value="">Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            @error('gender')
            <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>


      <!-- Date of Birth Field -->
      <div class="form-floating mb-3">
        <label for="dob" class="col-sm-3 col-form-label text-start">Date of Birth</label>
            <input type="date" class="form-control @error('dob') is-invalid @enderror" id="dob" name="dob" placeholder="Date of Birth">
            @error('dob')
            <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>


    <!-- City Field -->
    <div class="form-floating mb-3">
        <label for="city" class="col-sm-3 col-form-label text-start">City</label>
            <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" placeholder="City">
            @error('city')
            <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>


    <!-- Contact Number Field -->
    <div class="form-floating mb-3">
        <label for="contact" class="col-sm-3 col-form-label text-start">Contact Number</label>
            <input type="tel" class="form-control @error('contact') is-invalid @enderror" id="contact" name="contact" placeholder="Contact Number">
            @error('contact')
            <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>

    <!-- Department Field -->
    <div class="form-floating mb-3">
        <label for="department_id" class="col-sm-3 col-form-label text-start">Department</label>
            <select class="form-control @error('department_id') is-invalid @enderror" id="department_id" name="department_id">
                <option value="">Select Department</option>
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                @endforeach
            </select>
            @error('department_id')
            <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>


    <button type="submit" class="btn btn-primary">Add Employee</button>
</form>

@endsection




