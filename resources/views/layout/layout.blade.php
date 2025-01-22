<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notices</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Notice App</a>
            <span style="font-size: 20px; font-weight: bold; color: #5D5D5D;">
                <h3 style="display: inline-block; color: #2C3E50;">User: <span style="color: #3498db;">{{ Auth::user()->name }}</span></h3>
            </span>
        </div>

        <form action="{{ route('notice.logout') }}" method="POST" class="d-flex" style="margin-right:20px ">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </nav>
    <div class="container mt-4">
        @yield('content')
    </div>
</body>

</html>
