<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- ✅ Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- ✅ Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
</head>

<body>

    @include('include.header')
    

  <main>

        @yield('content')
    </main>

    @include('include.footer')

    <!-- ✅ Bootstrap Bundle JS -->
  @livewireScripts
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>




</body>
</html>
