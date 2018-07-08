<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" >
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <title>Document</title>
</head>
<body>
  @if(Session::has('success'))

    <script>
      swal("{{Session::get('success')[0]}}", "{{Session::get('success')[1]}}", "success");
  $not_success
    </script>
  @endif()

  @yield('top_content')
  <div class="container">
    
    @yield('content')
  

  </div>


</body>
</html>