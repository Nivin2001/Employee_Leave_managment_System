

@extends('LEMS.admin.master')
@section('title', 'Leave Types')

@section('content')
    <h1 style="padding: 0 35px" class="mb-3">Leave Types </h1>

    <div class="container mb-4">
        <!-- Button floated to the right -->
        <a href="{{ route('leave-types.create') }}" class="btn btn-primary mb-3" style="float: right;">Add New Leave Type</a>
    </div>

    {{-- Include any flash message --}}
    @include('LEMS.flash_action')

    <div class="table-responsive" style="padding: 0 35px">
        <table class="table table-bordered p-3 bg-white">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($leave_types as $index => $leaveType)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $leaveType->title }}</td>
                        <td>{{ $leaveType->description }}</td>
                        <td>{{ $leaveType->created_at->format('Y-m-d H:i:s') }}</td>
                        <td>
                            <a href="{{ route('leave-types.edit', $leaveType->id) }}" class="btn text-primary btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('leave-types.destroy', $leaveType->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn text-danger btn-sm" onclick="return confirm('Are you sure you want to delete this leave type?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
