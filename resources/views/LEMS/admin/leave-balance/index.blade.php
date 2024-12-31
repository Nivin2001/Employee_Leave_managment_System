@extends('LEMS.admin.master')

@section('content')
@include('LEMS.flash_action')
<div class="container">
    <h1 style="padding: 0 35px" class="mb-3">Leave Balance</h1>

    <div class="container mb-4">
        <!-- Button floated to the right -->
        <a href="{{ route('leave-balance.create') }}" class="btn btn-primary mb-3" style="float: right;">Add New Leave Balance</a>
    </div>
    <div class="table-responsive" style="padding: 0 35px">
        <table class="table table-bordered p-3 bg-white">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Leave Type</th>
                    <th>Leave Balance</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($balances as $key => $balance)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $balance->leaveType->title }}</td>
                        <td>{{ $balance->leave_balance }}</td>
                        <td>
                            <a href="{{ route('leave-balance.edit', $balance->id) }}" class="btn text-primary btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('leave-balance.destroy', $balance->id) }}" method="POST" class="d-inline">
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
</div>
@endsection
