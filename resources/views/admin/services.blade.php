<?php
    use App\Models\Services;
    use App\Models\Documents;
    $services = Services::all();
    $documents = Documents::all();
?>

@extends('admin.layouts.main')
@push('title', 'services')
@section('main_content')

    <h1>services</h1>

    <div class="container">
        <div class="sub container">
            <h4> Add new services </h4>
            {{-- Form Open --}}
            {!! Form::open([
                'url' => url('admin/services/add'),
                'method' => 'post',
                'class' => 'bv-form',
                'role' => 'form',
                'enctype' => 'multipart/form-data'
            ]) !!}
                {{-- name --}}
            {!! Form::text('name', '', [
                'class'=>'applynow-form-elem',
                'id'=>'name',
                'placeholder'=>'Service Name'
            ]) !!}
            @error('name')
            <small class="form-error"><br>&ensp;{{$message}}<br></small>
            @enderror
                {{-- Content --}}
            {!! Form::textarea('content', '', [
                'class'=>'applynow-form-elem',
                'id'=>'content',
                'placeholder'=>'Content of Service'
            ]) !!}
            @error('content')
            <small class="form-error"><br>&ensp;{{$message}}<br></small>
            @enderror
            <div class="documents">
                {!! Form::label('document', 'Select proper documents for the page', [
                    'id' => 'document',
                    'class' => 'applynow-form-elem'
                ]) !!}<br>
                    {{-- Documents --}}
                @foreach ($documents as $document)
                    {!! Form::checkbox("document_".$document->documents_id, $document->documents, true, [
                        "id" => 'document',
                        'class' => 'applynow-form-elem'
                    ]) !!}
                    {!! Form::label('document', $document->documents, [
                        'id' => 'document',
                        'class' => 'applynow-form-elem'
                    ]) !!}<br>
                @endforeach
            </div>

                {{-- Image --}}
            {!! Form::label('Image', 'Image', ['class'=>'']) !!}

            {!! Form::file('image', [
                'class'=>'applynow-form-elem',
                'id'=>'image'
            ]) !!}
            @error('image')
            <small class="form-error"><br>&ensp;{{$message}}<br></small>
            @enderror
                {{-- submit --}}
            {!! Form::submit('submit', [
                'class'=>'applynow-form-elem',
                'id'=>'submit'
            ]) !!}
                {{-- Form Close --}}
            {!! Form::close() !!}

                {{-- Data Table --}}
            <br>
            <div class='container'>
                <table class="table">
                    <thead>
                        <tr>
                            <th>name</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    @foreach ($services->reverse() as $service)
                    <tbody>
                        <tr>
                            <td>{{$service->name}}</td>
                            <td>
                                <a href="{{route('admin.services.edit',['id' => $service->service_id])}}"><button class="btn btn-info">Edit</button></a>
                            </td>
                            <td>
                                <a href="{{route('admin.services.delete',['id' => $service->service_id])}}"><button class="btn btn-danger">Delete</button></a>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
        </div>
    </div>

    @if(session()->has('alert'))
    <script>alert('{{ session()->get('alert') }}');</script>
@endif

@endsection
