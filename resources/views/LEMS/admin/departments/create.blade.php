

@extends('LEMS.admin.master')
@section('content')
<div class="container">
    <h1>Add Department</h1>

    <form action="{{ route('departments.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Department Name</label>
            <input type="text" class="form-control" id="name" name="name" required value="{{ old('name') }}">
            @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>

        <div class="form-group">
            <label for="description">Shortform</label>
            <input class="form-control" id="description" name="description">{{ old('description') }}</textarea>
            @if ($errors->has('description'))
                <span class="text-danger">{{ $errors->first('description') }}</span>
            @endif
        </div>

        <div class="form-group">
            <label for="contact_email">Contact Email</label>
            <input type="text" class="form-control" id="contact_email" name="contact_email" required value="{{ old('contact_email') }}">
            @if ($errors->has('contact_email'))
                <span class="text-danger">{{ $errors->first('contact_email') }}</span>
            @endif
        </div>

        <div class="form-group">
            <label for="contact_phone">Contact Phone</label>
            <input type="text" class="form-control" id="contact_phone" name="contact_phone" required value="{{ old('contact_phone') }}">
            @if ($errors->has('contact_phone'))
                <span class="text-danger">{{ $errors->first('contact_phone') }}</span>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{ route('departments.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
