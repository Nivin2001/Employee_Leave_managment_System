
@extends('LEMS.admin.master')
@section('title', 'All Employees')

@section('search')
    <!-- Topbar Search -->
    <form action="{{ route('employees.index') }}" method="get"
        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" name="search" class="form-control bg-light border-0 small" placeholder="Search for Employee..."
                aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>
@endsection

@section('content')

    @include('LEMS.flash_action')
    <h3 class="mb-4">All Employees</h3>

    <div class="container mb-4">
        <!-- Button floated to the right -->
        <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3" style="float: right;">Add New Employee</a>
    </div>

    <!-- Table container with white background and appropriate margins -->
    <div class="table-responsive" style="padding: 0 35px">
        <table class="table table-bordered p-3 bg-white">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Employee ID</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>Joined On</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $index => $employee)
                    <tr>
                        <td>{{ $index + 1 }}</td> <!-- Sequential number -->
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->id }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ optional($employee->department)->name ?? 'N/A' }}</td> {{-- Department name or 'N/A' --}}
                        <td>{{ $employee->created_at->diffForHumans() }}</td>
                        <td>
                            <a href="{{ route('employees.show', $employee->id) }}" class="btn text-info btn-sm">
                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                            </a>
                            <a class="btn btn-sm text-primary" href="{{ route('employees.edit', $employee->id) }}">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form class="d-inline" action="{{ route('employees.destroy', $employee->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm text-danger" onclick="return confirm('Are you sure?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    {{ $employees->links('pagination::bootstrap-5') }}
@endsection

@section('script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Optional: Add any custom scripts if needed
        });
    </script>
@endsection
