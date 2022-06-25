@php
    use App\Models\Services;
    $services = Services::all();
    $service_ids = array();
    foreach($services as $servicee){
      array_push($service_ids, $servicee->service_id);
    }
@endphp

@foreach ($services as $service)

@if ($service->name === $id )

@extends('layouts.main')
@push('title', $service->name)

@section('main_content')
<div class="service-main">

        {{-- content --}}
    <h1 class="heading">{{ $service->name}}</h1>

    <img class="container h-50 w-100" src="{{ url('storage/'.$service->image) }}"/>

     {!! $service->content !!}


<div class=container>
    <h4 class="heading text-left">Documents Required</h4>
     {!! $service->documents !!}
<a href="{{ url('/apply') }}"><button>Apply Now</button></a>
</div>
@endsection
</div>
@endif
@endforeach
