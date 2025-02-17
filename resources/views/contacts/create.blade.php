@extends('layout')

@section('content')
<h2>Add New Contact</h2>

<form action="{{ route('contacts.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label>Name <span class="text-danger">*</span></label>
        <input type="text" name="name" class="form-control" required>
        @error('name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group">
        <label>Phone <span class="text-danger">*</span></label>
        <input type="text" name="phone" class="form-control" required>
        @error('phone')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control">
        @error('email')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group">
        <label>Address</label>
        <textarea name="address" class="form-control"></textarea>
        @error('address')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <button type="submit" class="btn btn-success">Save</button>
    <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
