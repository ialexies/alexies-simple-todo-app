<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" >
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link rel="stylesheet" href="/css/app.css">
  <title>Document</title>
</head>
<body>




  {{ session(['user_details' => array("Alexies Iglesia", "ialexies@gmail.com",  \Request::ip())])}}

  @if(Session::has('user_details'))
    <div class="container-fluid center text-center topbar" >{{ Session::get('user_details')[0]}}  |  {{Session::get('user_details')[1]}}  |  {{ Session::get('user_details')[2]}}</div>
    @if(Session::has('success'))
      <script>
        swal("{{Session::get('success')[0]}}", "{{Session::get('success')[1]}}", "success");
      </script>
    @endif

    @yield('top_content')
    <div class="container">
      @yield('content')
    </div>

  @else
    Hey you dont have any user informations
  @endif


  <script>

  function confirm_delete($id){
    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this imaginary file!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        swal("Poof! Your imaginary file has been deleted!", {
          icon: "success",
        });
        window.location = "/todo/delete/"+$id;
      } else {
        swal("Your imaginary file is safe!");
      }
    });

  }



  </script>

  


  
</body>
</html>