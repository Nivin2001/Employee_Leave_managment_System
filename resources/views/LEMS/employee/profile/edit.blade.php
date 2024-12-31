@extends('LEMS.employee.master')

@section('content')
<div class="container">
    <div class="profile-container">
        <div class="row">
            <div class="col-md-4 text-center">
                <img src="https://via.placeholder.com/150" alt="Profile Picture">
            </div>
            <div class="col-md-8 profile-info">
                <h3>Edit Profile Information</h3>
                <form action="{{ route('profile.update', ['id' => auth()->user()->id]) }}" method="POST">
                    @csrf
                    @method('PUT') <!-- يجب إضافة هذه السطر ليتم إرسال الطلب كـ PUT -->

                    <!-- اسم المستخدم -->
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}">
                    </div>

                    <!-- البريد الإلكتروني -->
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}">
                    </div>

                    <!-- رقم الاتصال -->
                    <div class="form-group">
                        <label for="Contact_Number">Contact Number</label>
                        <input type="text" class="form-control" id="Contact_Number" name="Contact_Number" value="{{ auth()->user()->contact }}">
                    </div>

                    <!-- القسم -->
                    <div class="form-group">
                        <label for="department">Department</label>
                        <select class="form-control" id="department" name="department_id">
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}" {{ auth()->user()->department_id == $department->id ? 'selected' : '' }}>
                                    {{ $department->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- زر حفظ التغييرات -->
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>

@endsection
