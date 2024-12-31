@extends('LEMS.admin.master')

@section('content')
<div class="container">
    <h3 class="mb-4">Admin Dashboard</h3>
    <div class="table-responsive">
        <table class="table table-bordered bg-white shadow-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($admins as $index => $admin)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
