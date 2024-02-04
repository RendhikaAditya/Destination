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
  
  <style>
    .rating-container {
        display: flex;
        align-items: center;
    }

    .star-rating {
        display: flex;
        align-items: center;
        margin-right: 10px; 
    }

    .star-rating label {
        margin: 0;
    }
</style>

<style>
    .star-rating {
        font-size: 0;
        direction: rtl; 
        margin-right: 0; 
    }

    .star-rating input {
        display: none;
    }

    .star-rating label {
        font-size: 30px;
        cursor: pointer;
        display: inline-block;
        color: #aaa; 
    }

    .star-rating label:before {
        content: '\2605';
    }

    .star-rating input:checked ~ label:before {
        content: '\2605';
        color: #FFD700;
    }

    .star-rating input#star1:checked ~ label#star1:before {
        color: #87CEEB; 
    }

    .star-rating input#star2:checked ~ label#star2:before {
        color: #98FB98; 
    }

    .star-rating input#star3:checked ~ label#star3:before {
        color: #FFD700; 
    }

    .star-rating input#star4:checked ~ label#star4:before {
        color: #FFA07A;
    }

    .star-rating input#star5:checked ~ label#star5:before {
        color: #FF6347; 
    }

    button[type="submit"] {
        margin-right: 10px; 
    }
</style>

</head>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="{{url('/visitor')}}" class="navbar-brand"><b>SIO </b>WISATA</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>
        {{-- <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
                       <li><a href="{{url('/lokasi')}}">Lokasi Objek Wisata</a></li>
          </ul>
        </div> --}}
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li>
              <a href="/logout">
                <i class="fa fa-sign-out"></i> Logout
              </a>
            </li>
          </ul>
				</div>
      </div>
    </nav>
  </header>