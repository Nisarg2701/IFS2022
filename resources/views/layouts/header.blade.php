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
    <header class="body-font">
  <nav class="flex items-center justify-between flex-wrap body-font p-1 fixed w-full z-10 top-0">
		<div class="flex items-center flex-shrink-0 text-white mr-10">
    <a class="" href="#"><img src="{{ url('images\output-onlinepngtools logo.png') }}" alt="Logo" style="width:40px;"></a>
    <a class="ml-3 text-xl" href="#"><img src="{{ url('images\output-onlinepngtools.png') }}" alt="Logo" style="width:140px;"></a>
		</div>

		<div class="block xl:hidden">
			<button id="nav-toggle" class="flex items-center px-3 py-2 text-gray-500 border-gray-600 hover:text-white hover:border-white nav-button">
				<svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
			</button>
		</div>

		<div class="w-full flex-grow xl:flex xl:items-center xl:w-auto hidden xl:block pt-6 xl:pt-0" id="nav-content">
			<ul class="list-reset xl:flex justify-end flex-1 items-center header">
				<li class="mr-3 header">
          <a class=" mr-5 hover:bg-black hover:text-white nav-link @if ($__env->yieldPushContent('title') == "Home") text-white @endif" href="{{ url('/') }}">Home</a>
				</li>
				<li class="mr-3 header">
          <a class="mr-5 hover:bg-black hover:text-white nav-link @if ($__env->yieldPushContent('title') == "About Us") text-white @endif" href="{{ url('/about') }}">About Us</a>
				</li>
				<li class="mr-3 header">
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
				</li>
				<li class="mr-3 header">
          <a class="mr-5 hover:bg-black hover:text-white nav-link @if ($__env->yieldPushContent('title') == "Apply Now") text-white @endif" href="{{ url('/apply') }}">Apply Now</a>
				</li>
        <li class="mr-3 header">
        <a class="mr-5 hover:bg-black hover:text-white nav-link @if ($__env->yieldPushContent('title') == "Careers") text-white @endif" href="{{ url('/careers') }}">Careers</a>
				</li>
			</ul>
		</div>
	</nav>

	<!--Container-->
	<!-- <div class="container shadow-lg mx-auto bg-white mt-24 md:mt-18">

	</div> -->

	<script>
		//Javascript to toggle the menu
		document.getElementById('nav-toggle').onclick = function(){
			document.getElementById("nav-content").classList.toggle("hidden");
		}
	</script>
  </header>
<!-- <header class="text-gray-600 body-font">
<div class=" mx-auto flex  md:flex-row items-center">
    <a class="" href="#"><img src="{{ url('images\output-onlinepngtools logo.png') }}" alt="Logo" style="width:40px;"></a>
    <a class="ml-3 text-xl" href="#"><img src="{{ url('images\output-onlinepngtools.png') }}" alt="Logo" style="width:140px;"></a>
  </a>
  <button class="text-white inline-flex p-3 hover:bg-gray-900 rounded lg:hidden ml:auto"></button>
    <div class="top-nav w-full lg:inline-flex lg:flex-grow lg:w-auto" id="navigation">
        <nav class="md:ml-auto md:mr-auto flex flex-wrap items-center text-base justify-center">
          <a class=" mr-5 hover:bg-black hover:text-white nav-link @if ($__env->yieldPushContent('title') == "Home") text-white @endif" href="{{ url('/') }}">Home</a>
          <a class="mr-5 hover:bg-black hover:text-white nav-link @if ($__env->yieldPushContent('title') == "About Us") text-white @endif" href="{{ url('/about') }}">About Us</a>

          <a class="mr-5 hover:bg-black hover:text-white nav-link @if ($__env->yieldPushContent('title') == "Apply Now") text-white @endif" href="{{ url('/apply') }}">Apply Now</a>
          <a class="mr-5 hover:bg-black hover:text-white nav-link @if ($__env->yieldPushContent('title') == "Careers") text-white @endif" href="{{ url('/careers') }}">Careers</a>
        </nav>
    </div>
</div>
</header> -->
