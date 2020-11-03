<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{ $title }}</title>
    <meta  name="description" content="{{ $description }}">
    <meta  name="keywords" content="{{ $keywords }}">
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('public/assets/css/app.min.css') }}">
  <link rel="stylesheet" href="{{ asset('public/assets/bundles/bootstrap-social/bootstrap-social.css') }}">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('public/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('public/assets/css/components.css') }}">
  <!-- Custom style CSS -->
  
  <link rel='shortcut icon' type='image/x-icon' href="{{ asset('public/assets/img/favicon.ico') }}" />
</head>

<body class="background-image-body">
  <div class="loader"></div>
  @yield('content')

  
  <!-- General JS Scripts -->
  <script src="{{ asset('public/assets/js/app.min.js') }}"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="{{ asset('public/assets/js/scripts.js') }}"></script>
  
</body>


</html>