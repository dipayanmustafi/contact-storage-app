@extends('layout')

@section('content')
<div class="row mb-3">
    <div class="col-md-6">
        <h2>Contacts</h2>
    </div>
    <div class="col-md-6 text-right">
        <a href="{{ route('contacts.create') }}" class="btn btn-primary">Add Contact</a>
    </div>
</div>

<!-- Search Form -->
<form method="GET" action="{{ route('contacts.index') }}" class="mb-3">
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Search contacts..." value="{{ request('search') }}">
        <div class="input-group-append">
            <button class="btn btn-secondary" type="submit">Search</button>
        </div>
    </div>
</form>

<!-- Import Form -->
<form method="POST" action="{{ route('contacts.import') }}" enctype="multipart/form-data" class="mb-3">
    @csrf
    <div class="form-group">
        <label for="xml_file">Import Contacts (XML file)</label>
        <input type="file" name="xml_file" id="xml_file" class="form-control-file" required>
    </div>
    <button type="submit" class="btn btn-info">Import Contacts</button>
</form>

<!-- Contacts List -->
<div class="scrollable-table">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Address</th>
                <th width="180">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($contacts as $contact)
                <tr>
                    <td>{{ $contact->id }}</td>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->phone }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->address }}</td>
                    <td>
                        <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this contact?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No contacts found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
