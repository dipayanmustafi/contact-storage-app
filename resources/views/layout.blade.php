<!DOCTYPE html>
<html>
<head>
    <title>Contacts CRUD Application</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        /* For the contact list with scrollbar */
        .scrollable-table {
            max-height: 400px;
            overflow-y: auto;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success">
              {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>
