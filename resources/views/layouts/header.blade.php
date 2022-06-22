<!doctype html>
<html lang="en">
  <head>
    <title>
        @stack('title')
    </title>
    <!-- js&css (testimonial) -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>

    <!-- css -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=PT+Serif&display=swap" rel="stylesheet"> -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anek+Malayalam:wght@200;300&family=Libre+Baskerville&display=swap" rel="stylesheet">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link type="text/css" rel="stylesheet" href="{{ url('css\text.css') }}">
    <link type="text/css" rel="stylesheet" href="{{url('css\footer.css')}}">
    <link type="text/css" rel="stylesheet" href="{{url('css\webPro.css')}}">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  </head>

  @php
  use App\Models\Services;
  $services = Services::all();
  @endphp

  <body>
<header class="text-gray-600 body-font">
<div class=" mx-auto flex  md:flex-row items-center">
    <a class="" href="#"><img src="{{ url('images\innovative_logo_design.jpg') }}" alt="Logo" style="width:40px;"></a>
    <a class="ml-3 text-xl" href="#"><img src="{{ url('images\innovative_logo_name.jpg') }}" alt="Logo" style="width:140px;"></a>
  </a>
  <nav class="md:ml-auto md:mr-auto flex flex-wrap items-center text-base justify-center">
    <a class=" mr-5 hover:text-white nav-link @if ($__env->yieldPushContent('title') == "Home") danger @endif" href="{{ url('/') }}">Home</a>
    <a class="mr-5 hover:text-white nav-link @if ($__env->yieldPushContent('title') == "About Us") danger @endif" href="{{ url('/about') }}">About Us</a>
      <div class="mr-5 hover:text-white">
        <a class="hover:text-white dropdown-toggle dropdown nav-link @if (isset($id)&&$__env->yieldPushContent('title') == $id) active @endif" href="#" id="navbardrop" data-toggle="dropdown">
          Services
        </a>
          <div class="dropdown-menu nav-item">

              @foreach ($services as $service)
                  <a class="dropdown-item " href="{{ url('/services/'.$service->name) }}">{{ $service->name }}</a>
              @endforeach

          </div>
      </div>
    <a class="mr-5 hover:text-white nav-link @if ($__env->yieldPushContent('title') == "Apply Now") active @endif" href="{{ url('/apply') }}">Apply Now</a>
    <a class="mr-5 hover:text-white nav-link @if ($__env->yieldPushContent('title') == "Careers") active @endif" href="{{ url('/careers') }}">Careers</a>
  </nav>
</div>
</header>


<!-- <nav class="navbar navbar-expand-sm bg-primary navbar-dark ">

    <a class="navbar-brand" href="#"><img src="{{ url('images\innovative_logo_name.jpg') }}" alt="Logo" style="width:140px;"></a>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link  @if ($__env->yieldPushContent('title') == "Home") active @endif" href="{{ url('/') }}">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link @if ($__env->yieldPushContent('title') == "About Us") active @endif" href="{{ url('/about') }}">About Us</a>
      </li>
      <li class="nav-item dropdown @if (isset($id)&&$__env->yieldPushContent('title') == $id) active @endif">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          Services
        </a>
        <div class="dropdown-menu">

            @foreach ($services as $service)
                <a class="dropdown-item bg-primary" href="{{ url('/services/'.$service->name) }}">{{ $service->name }}</a>
            @endforeach

        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link @if ($__env->yieldPushContent('title') == "Apply Now") active @endif" href="{{ url('/apply') }}">Apply Now</a>
      </li>
      <li class="nav-item">
        <a class="nav-link @if ($__env->yieldPushContent('title') == "Careers") active @endif" href="{{ url('/careers') }}">Careers</a>
      </li>
    </ul>
  </nav> -->
