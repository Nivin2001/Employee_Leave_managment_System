@extends('LEMS.admin.master')

 @section('content')
    <div class="container">
        <h1>Edit Leave Balance</h1>
        <form action="{{ route('leave-balance.update', $Balance->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- لتحديد أن هذه العملية هي PUT للتحديث -->

            <div class="form-group">
                <label for="leave_type">Leave Type</label>
                <select id="leave_type" name="leave_type_id" class="form-control" required>
                    <option value="">Select Leave Type</option>
                    @foreach($leaveTypes as $leaveType)
                        <option value="{{ $leaveType->id }}" {{ $Balance->leave_type_id == $leaveType->id ? 'selected' : '' }}>
                            {{ $leaveType->title }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="balance">Balance</label>
                <input type="number" id="balance" name="leave_balance" class="form-control" value="{{ $Balance->leave_balance }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
@endsection
