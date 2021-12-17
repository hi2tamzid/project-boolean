<!DOCTYPE html>
<html lang="en">

<head>
  @include('includes.head')
</head>

<body>

  <header>
    @include('includes.navigator', ['account_holder' => 'Admin', 'overviewActive' => $overviewActive ?? '', 'controlPanelActive' => $controlPanelActive ?? ''])
  </header>

  
    @yield('content')

  <!-- Vendor JS Files -->
  @include('includes.scripts')
</body>

</html>