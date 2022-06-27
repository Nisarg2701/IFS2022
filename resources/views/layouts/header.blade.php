<!doctype html>
<html lang="en">
  <head>
    <title>
        @stack('title')
    </title>

    <!-- css -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Anek+Malayalam:wght@200;300&family=Libre+Baskerville&display=swap" rel="stylesheet">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link type="text/css" rel="stylesheet" href="{{ url('css\text.css') }}">
    <link type="text/css" rel="stylesheet" href="{{url('css\footer.css')}}">
    <link type="text/css" rel="stylesheet" href="{{url('css\webPro.css')}}">


    {{-- Owl carousal --}}
    <link rel="stylesheet" href="{{ url('owlcarousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ url('owlcarousel/assets/owl.theme.default.min.css') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="{{ url('owlcarousel/jquery.min.js') }}"></script>

</head>



  @php
  use App\Models\Services;
  $services = Services::all();
  @endphp

  <body>
    <!-- <header>
  <nav class="fixed top-0 left-0 bg-white w-full shadow">
  <div class="container m-auto flex justify-between items-center text-gray-700">
    <h1 class="pl-8 py-4 text-xl font-bold">HARTDEV</h1>
    <ul class="hidden md:flex items-center pr-10 text-base font-semibold cursor-pointer">
      <li class="hover:bg-gray-200 py-4 px-6">Home</li>
      <li class="hover:bg-gray-200 py-4 px-6">Contact</li>
      <li class="hover:bg-gray-200 py-4 px-6">Services</li>
      <li class="hover:bg-gray-200 py-4 px-6">About</li>
    </ul>
    <button class="block md:hidden py-3 px-4 mx-2 rounded focus:outline-none hover:bg-gray-200 group">
      <div class="w-5 h-1 bg-gray-600 mb-1"></div>
      <div class="w-5 h-1 bg-gray-600 mb-1"></div>
      <div class="w-5 h-1 bg-gray-600"></div>
      <div class="absolute top-0 -right-full h-screen w-8/12 bg-white border opacity-0
      group-focus:right-0 group-focus:opacity-100 transition-all duration-300">
        <ul class="flex flex-col items-center w-full text-base cursor-pointer pt-10">
          <li class="hover:bg-gray-200 py-4 px-6 w-full">Home</li>
          <li class="hover:bg-gray-200 py-4 px-6 w-full">Contact</li>
          <li class="hover:bg-gray-200 py-4 px-6 w-full">Services</li>
          <li class="hover:bg-gray-200 py-4 px-6 w-full">About</li>
        </ul>
      </div>
    </button>
  </div>
</nav>
</header> -->
<header class="text-gray-600 body-font">
<div class=" mx-auto flex  md:flex-row items-center">
    <a class="" href="#"><img src="{{ url('images\output-onlinepngtools logo.png') }}" alt="Logo" style="width:40px;"></a>
    <a class="ml-3 text-xl" href="#"><img src="{{ url('images\output-onlinepngtools.png') }}" alt="Logo" style="width:140px;"></a>
  </a>
  <button class="text-white inline-flex p-3 hover:bg-gray-900 rounded lg:hidden ml:auto"></button>
    <div class="top-nav w-full lg:inline-flex lg:flex-grow lg:w-auto" id="navigation">
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
</div>
</header>
