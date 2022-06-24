<!doctype html>
<html lang="en">
  <head>
    <title>
        @stack('title')
    </title>

    <!-- css -->
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"/>
  </head>

  @php
  use App\Models\Services;
  $services = Services::all();
  @endphp

  <body>
<header class="text-gray-600 body-font">
<div class=" mx-auto flex  md:flex-row items-center">
    <a class="" href="#"><img src="{{ url('images\output-onlinepngtools logo.png') }}" alt="Logo" style="width:40px;"></a>
    <a class="ml-3 text-xl" href="#"><img src="{{ url('images\output-onlinepngtools.png') }}" alt="Logo" style="width:140px;"></a>
  </a>
  <nav class="md:ml-auto md:mr-auto flex flex-wrap items-center text-base justify-center">
    <a class=" mr-5 hover:bg-black hover:text-white nav-link @if ($__env->yieldPushContent('title') == "Home") text-white @endif" href="{{ url('/') }}">Home</a>
    <a class="mr-5 hover:bg-black hover:text-white nav-link @if ($__env->yieldPushContent('title') == "About Us") text-white @endif" href="{{ url('/about') }}">About Us</a>
      <div class="mr-5">
        <a class="hover:bg-black hover:text-white dropdown-toggle dropdown nav-link @if (isset($id)&&$__env->yieldPushContent('title') == $id) text-white @endif" href="#" id="navbardrop" data-toggle="dropdown">
          Services
        </a>
          <div class="dropdown-menu nav-item bg-dark" >
              @foreach ($services as $service)
                  <a class="dropdown-item text-white bg-dark"  href="{{ url('/services/'.$service->name) }}">{{ $service->name }}</a>
              @endforeach

          </div>
      </div>
    <a class="mr-5 hover:bg-black hover:text-white nav-link @if ($__env->yieldPushContent('title') == "Apply Now") text-white @endif" href="{{ url('/apply') }}">Apply Now</a>
    <a class="mr-5 hover:bg-black hover:text-white nav-link @if ($__env->yieldPushContent('title') == "Careers") text-white @endif" href="{{ url('/careers') }}">Careers</a>
  </nav>
</div>
</header>
