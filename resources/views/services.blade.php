@php
    use App\Models\Services;
    $services = Services::all();
@endphp

@foreach ($services as $service)

@if ($service->name === $id )

@extends('layouts.main')
@push('title', $service->name)
@section('main_content')
    <h1>{{ $service->name}}</h1>


@endsection

@endif

@endforeach
