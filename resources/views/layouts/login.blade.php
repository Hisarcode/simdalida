<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Simdalida - Login/Register</title>

  <!-- Custom fonts for this template-->
  <link href="{{ url('backend/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
  <link rel="icon" type="image/favicon.png" href="{{ url('front/img/logo-sgu.png') }}">

  <!-- Custom styles for this template-->
  <link href="{{ url('backend/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    @yield('content')

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ url('backend/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ url('backend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ url('backend/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ url('backend/js/sb-admin-2.min.js') }}"></script>

  <script type="text/javascript">
    $(document).ready(function() {
        $("#inisiator_id").change(function() {
            let selector = $(this).val();
            console.log(selector);
            if (selector == 3) {
                console.log('ok');
                document.querySelector('label[for=nik]').innerHTML ="NIP";
            } else {
              document.querySelector('label[for=nik]').innerHTML="NIK";
            }

        });


    });
  </script>


</body>

</html>