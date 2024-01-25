<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title  ?></title>
   <link rel="shortcut icon" href="{{asset('lte/dist/img/logo.png')}}">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('lte/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('lte/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('lte/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('lte/dist/css/AdminLTE.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('lte/plugins/iCheck/square/blue.css')}}">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="register-box">
  <div class="register-logo">
    <a href="{{ route('/') }}"><b>SIO </b>WISATA</a>
  </div>
  <div class="register-box-body">
     <div class="register-box-msg">
            @if(session('success'))
            <div class="alert alert-success" role="alert"> 
                {{session('success')}}
            </div>
            @endif
            @if($errors->any())
            <div class="alert alert-danger"> 
                <ul>
                  @foreach ($errors->all() as $item)
                    <li style="text-align: left">{{ $item }}</li>
                  @endforeach
                </ul>
            </div>
            @endif
            <form action="{{ route('actionregister') }}" method="post">
            @csrf
                <div class="form-group" style="text-align: left">
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control" placeholder="" required>
                </div>
                <div class="form-group" style="text-align: left">
                    <label>Alamat</label>
                    <input type="text" name="address" class="form-control" placeholder="" required>
                </div>
                <div class="form-group" style="text-align: left">
                    <label>Email Address</label>
                    <input type="text" name="email" class="form-control" placeholder="name@example.com" required>
                </div>
                <div class="form-group" style="text-align: left">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
                <hr>
                <p class="text-center">Sudah punya akun? <a href="/login">Login</a> sekarang!</p>
            </form>
        </div>
  </div>
</div>
<script src="{{asset('lte/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('lte/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('lte/plugins/iCheck/icheck.min.js')}}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
