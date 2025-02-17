@extends('layout')

@section('content')
<h2>Edit Contact</h2>

<form action="{{ route('contacts.update', $contact->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label>Name <span class="text-danger">*</span></label>
        <input type="text" name="name" class="form-control" value="{{ $contact->name }}" required>
        @error('name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group">
        <label>Phone <span class="text-danger">*</span></label>
        <input type="text" name="phone" class="form-control" value="{{ $contact->phone }}" required>
        @error('phone')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ $contact->email }}">
        @error('email')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group">
        <label>Address</label>
        <textarea name="address" class="form-control">{{ $contact->address }}</textarea>
        @error('address')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
