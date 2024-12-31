
@extends('LEMS.admin.master')
@section('title', 'Edit Employee')
@section('content')
    <h3>Edit Employee</h3>
    <form action="{{ route('employees.update', $employees->id) }}" method="POST">
        @csrf
        @method('PUT')

        @include('LEMS.flash_erroe')
        <div class="form-floating mb-3">
            <label for="name">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                placeholder="Name" value="{{ old('name', $employees->name) }}">
            @error('name')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-floating mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                placeholder="Your email" value="{{ old('email', $employees->email) }}">
            @error('email')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-floating mb-3">
            <label for="password">Password</label>
            <div class="input-group">
                <input type="password" class="form-control" id="password" name="password" placeholder="Your password">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                        <i class="fa fa-eye"></i>
                    </button>
                </div>
            </div>

        </div>




        <button type="submit" class="btn btn-primary">Update Employee</button>
    </form>

@section('script')

    <script>
        $(document).ready(function() {
            const passwordInput = $('#password');
            const toggleButton = $('#togglePassword');

            toggleButton.on('click', function() {
                const type = passwordInput.attr('type');
                if (type === 'password') {
                    passwordInput.attr('type', 'text');
                    toggleButton.find('i').removeClass('fa-eye').addClass('fa-times');
                } else {
                    passwordInput.attr('type', 'password');
                    toggleButton.find('i').removeClass('fa-times').addClass('fa-eye');
                }
            });

            toggleButton.on('mouseenter', function() {
                passwordInput.attr('type', 'text');
                toggleButton.find('i').removeClass('fa-eye').addClass('fa-times');
            });

            toggleButton.on('mouseleave', function() {
                const type = passwordInput.attr('type');
                if (type !== 'password') {
                    passwordInput.attr('type', 'password');
                    toggleButton.find('i').removeClass('fa-times').addClass('fa-eye');
                }
            });
        });
    </script>
@endsection

@endsection
