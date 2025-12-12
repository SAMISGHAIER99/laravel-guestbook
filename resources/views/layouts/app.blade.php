<!doctype html>
<html lang="it">
<head>
  <meta charset="utf-8">
  <title>@yield('title', 'Guestbook')</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

{{-- NAVBAR --}}
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="{{ route('guestbook.index') }}">
      Laravel Guestbook
    </a>
  </div>
</nav>

{{-- CONTENUTO PAGINA --}}
<main class="container py-4">
  @yield('content')
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
