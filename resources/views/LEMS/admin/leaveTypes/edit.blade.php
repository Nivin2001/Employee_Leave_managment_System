
@extends('LEMS.admin.master')
@section('title', 'Edit Leave Type')

@section('content')
    <h1>Edit Leave Type</h1>

        <form action="{{ route('leave-types.update', $leave_types->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $leave_types->title) }}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control">{{ old('description', $leave_types->description) }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>

@endsection
