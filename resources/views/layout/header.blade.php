<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title  ?></title>
  <link rel="shortcut icon" href="{{asset('lte/dist/img/logo.png')}}">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{asset('lte/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('lte/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('lte/bower_components/Ionicons/css/ionicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('lte/dist/css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{asset('lte/dist/css/skins/_all-skins.min.css')}}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="{{ '/' }}" class="navbar-brand"><b>SIO </b>WISATA</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            {{-- <li class=""><a href="{{url('/')}}">Objek Wisata</a></li> --}}
            <li><a href="{{url('/lokasi')}}">Lokasi Objek Wisata</a></li>
          </ul>
        </div>
        <div class="navbar-custom-menu">
						<ul class="nav navbar-nav">
							<li>
								<a href="{{url('admin/login')}}">
									<i class="fa fa-sign-in"></i> Login
								</a>
							</li>
						</ul>
					</div>
      </div>
    </nav>
  </header>