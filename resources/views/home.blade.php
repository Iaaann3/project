<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Judul Halaman')</title>

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('/admin/css/style.css') }}">
</head>
<body>

    {{-- Navbar, Sidebar, dsb --}}
    @include('layouts.part.navbar')
    @include('layouts.part.sidebar')

    {{-- Isi halaman --}}
    <div class="main-content">
        @yield('content')
    </div>

    <!-- JS -->
    <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Your Custom JS -->
<script src="{{ asset('/admin/js/custom.js') }}"></script>
</body>
</html>
