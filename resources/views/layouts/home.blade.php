<!DOCTYPE html>
<html lang="en">

<head>
  @include('includes.head')
</head>

<body>

  <header>
    @include('includes.header', ['registerActive' => $registerActive ?? '', 'homeActive' => $homeActive ?? ''])
  </header>

  
    @yield('content')

  <!-- Vendor JS Files -->
  @include('includes.scripts')
</body>

</html>