<!DOCTYPE html>
<html lang="en">

<head>
  @include('includes.head')
</head>

<body>

  <header>
    @include('includes.header')
  </header>
  
  @yield('content')

  <!-- Vendor JS Files -->
  @include('includes.scripts')
</body>

</html>