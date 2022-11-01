<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sekawans TB Jember</title>
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
  <x-navbar />

  <main style="min-height: 100vh">
    @yield('content')
  </main>

  <x-footer />
</body>

</html>