
@extends('LEMS.admin.master')
@section('title', 'All Department')

@section('content')
    <div class="container mb-4">
        <h1>All Departments</h1>

        <!-- Button floated to the right -->
        <a href="{{ route('departments.create') }}" class="btn btn-primary mb-3" style="float: right;">Add New Department</a>

        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <!-- Table container with white background and margins -->
        <div class="table-responsive" style="padding: 0 1px">
            <table class="table table-bordered p-3 bg-white">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Department</th>
                        <th>Shortform</th>
                        <th>Contact Email</th>
                        <th>Contact Phone</th>
                        <th>Created_at</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($departments as $index => $department)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $department->name }}</td>
                            <td>{{ $department->description }}</td>
                            <td>{{ $department->contact_email }}</td>
                            <td>{{ $department->contact_phone }}</td>
                            <td>{{ $department->created_at }}</td>
                            <td>
                                <div class="icon-container">
                                    <a href="{{ route('departments.show', $department->id) }}" class="btn text-info btn-sm">
                                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                    </a>
                                    <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-sm text-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('departments.destroy', $department->id) }}" method="POST" style="display: inline;">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-sm text-danger" onclick="return confirm('Are you sure you want to delete this department?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
