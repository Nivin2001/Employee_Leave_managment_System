@extends('LEMS.employee.master')



    <style>
        body {
            background-color: #f8f9fa;
        }

        .profile-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 50px;
        }
        .profile-container img {
            max-width: 150px;
            border-radius: 50%;
        }
        .profile-info {
            margin-left: 30px;
        }
        .profile-info h5 {
            font-weight: 500;
        }
        .profile-info button {
            margin-top: 20px;
        }
    </style>
    @section('content')

    <div class="container">
        <div class="profile-container">
            <div class="row">
                <div class="col-md-4 text-center">
                    <img src="https://via.placeholder.com/150" alt="Profile Picture">
                </div>
                <div class="col-md-8 profile-info">
                    <h3>Profile Information</h3>
                    <hr>
                    <h5>Name: {{ auth()->user()->name }}</h5> <!-- جلب الاسم من قاعدة البيانات -->
                    <h5>Email: {{ auth()->user()->email }}</h5> <!-- جلب الإيميل -->
                    <h5>Contact_Number:  {{ auth()->user()->contact }}</h5> <!-- افتراضية، يمكن تحديثها لاحقًا -->
                    <h5>Department:  {{ auth()->user()->department ? auth()->user()->department->name : 'No department assigned' }}</h5>

                    <a href="{{ route('profile.edit', ['id' => Auth::id()]) }}" class="btn btn-primary">Edit Profile</a>

                    <a href="{{ route('leave-requests.index') }}" class="btn btn-secondary mt-2">Back </a> <!-- العودة إلى لوحة التحكم -->
                </div>
            </div>
        </div>
    </div>

    @endsection



<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>

