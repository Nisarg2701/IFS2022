@php
    use App\Models\Home;
    $homes = Home::all();
    $i = 1;
    $slides = array();
    foreach($homes as $home)
        if($home->visibility == 'yes')
            array_push($slides, '');

    use App\Models\Services;
    $services = Services::all();
    $service_ids = array();
    foreach($services as $service){
      array_push($service_ids, $service->service_id);
    }
@endphp


@extends('layouts.main')
@push('title', 'Home')
@section('main_content')
<div class="home-main">
<div id="carouselExampleIndicators" class="carousel slide carousel-css" data-ride="carousel">
  <ol class="carousel-indicators">
    @for ($j = 0; $j < sizeof($slides); $j++)
        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $j }}" class="active"></li>
    @endfor
  </ol>
  <div class="carousel-inner">
    @foreach ($homes as $home)
        @if ($home->visibility == 'yes')
            <div class="carousel-item @if($i == 1) active @endif">
                <img class="d-block w-100 carouselImg" src="{{ url('storage/'.$home->image) }}" alt="First slide">
            </div>
        @endif
        @php
            $i = 0;
        @endphp
    @endforeach
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  </div>

<div class="container">
    <h1 class="text-3xl font-medium title-font text-white mb-12 aboutus-heading">Innovative Financial Solution</h1>
    <p class="aboutus-info text-white">
    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
    </p>
</div>
<h2 class="heading">Services</h2>
<div class="owl-carousel owl-theme text-white">
    @foreach ($services as $service)
        <div class="item">
            <a href="{{ url('/services/'.$service->name) }}">
            <img class="h-25" src = "{{ url('storage/'.$service->image) }}" alt="{{ $service->name }} image"  style="height:10vh"/>
            <h4 class="bg-white text-black text-center">{{ $service->name }}</h4>
            </a>
        </div>
    @endforeach
</div>
  <script>
    $(document).ready(function(){
        $(".owl-carousel").owlCarousel({
            stagePadding: 50,
            center: true,
            loop:true,
            margin:10,
            autoplay:true,
            autoplayTimeout:3000,
            autoWidth:true,
            autoplayHoverPause:true,
            nav:true,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                    nav:true
                },
                600:{
                    items:3,
                    nav:false
                },
                1000:{
                    items:5,
                    nav:true,
                    loop:true
                }
            }
        });
    });
</script>

@endsection
</div>
