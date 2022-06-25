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

<!-- services -->
<h1 class="text-3xl font-medium title-font text-white mb-12 text-center aboutus-heading">
    Services</h1>
<div class="container my-5">
  <!--Carousel Wrapper-->
  <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">
    <!--Indicators-->
    <ol class="carousel-indicators">
      <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
      <li data-target="#multi-item-example" data-slide-to="1"></li>
    </ol>
    <!--/.Indicators-->

    <!--Slides-->
    <div class="carousel-inner" role="listbox">

      <!--First slide-->
      <div class="carousel-item active">

        <div class="row">
        @for ($i = 0; $i < 3; $i++)
        @php
          $service = Services::find($service_ids[$i]);
        @endphp
          <div class="col-md-4">
            <div class="card mb-2">
            <img class="card-img-top" src="{{ url('storage/'.$service->image) }}"
                   alt="Card image cap">
                   <a class="" href="{{ url('/services/'.$service->name) }}"><h4 class="card-title text-center">{{$service->name}}</h4></a>
            </div>
          </div>
          @endfor
        </div>
      </div>

      <!--/.First slide-->

      <!--Second slide-->
      @php
        $size = sizeof($service_ids);
        if($size>6){
          $n=6;
        }else{
          $n=$size;
        }
      @endphp
      <div class="carousel-item">
        <div class="row">
        @for ($i = 3; $i < $n; $i++)
        @php
          $service = Services::find($service_ids[$i]);
          if($service == null){
            break;
          }
        @endphp
          <div class="col-md-4">
            <div class="card mb-2">
              <img class="card-img-top" src="{{ url('storage/'.$service->image) }}"
                   alt="Card image cap">
                   <a class="" href="{{ url('/services/'.$service->name) }}"><h4 class="card-title text-center">{{$service->name}}</h4></a>
            </div>
          </div>
        @endfor
        </div>

      </div>
      <!--/.Second slide-->
    </div>
    <!--Controls-->
    <div class="controls-top justify-content-center text-center">
      <a class="btn-floating" href="#multi-item-example" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
      <a class="btn-floating" href="#multi-item-example" data-slide="next"><i class="fa fa-chevron-right"></i></a>
    </div>
    <!--/.Controls-->
  </div>
</div>

@endsection
</div>
