
@php
    use App\Models\Principals;
    $principals = Principals::all();
@endphp

@extends('admin.layouts.main')
@push('title', 'Principals')
@section('main_content')

<h1>Principals</h1>
<div class="container">
{{-- Form Open --}}
{!! Form::open([
    'url' => url('admin/about/principals/add'),
    'method' => 'post',
    'class' => 'bv-form',
    'role' => 'form',
    'enctype' => 'multipart/form-data'
]) !!}
    {{-- name --}}
{!! Form::text('name', '', [
    'class' => 'applynow-form-elem',
    'id' => 'name',
    'placeholder' => 'add a name'
]) !!}
@error('name')
<small class="form-error"><br>&ensp;{{$message}}<br></small>
@enderror
    <br>
    {{-- image --}}
{!! Form::label('Image', 'Image', ['class' => '']) !!}

{!! Form::file('image', [
    'class' => 'applynow-form-elem',
    'id' => 'image'
]) !!}
@error('image')
<small class="form-error"><br>&ensp;{{$message}}<br></small>
@enderror
    <br>
    {{-- submit --}}
{!! Form::submit('submit', [
    'class' => 'applynow-form-elem',
    'id' => 'submit'
]) !!}
    {{-- Form Close --}}
{!! Form::close() !!}
</div>
{{-- Data Table --}}
<br>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Image</th>
                    <th></th>
                </tr>
            </thead>
            @foreach ($principals->reverse() as $principal)
            <tbody>
                <tr>
                    <td>{{$principal->name}}</td>
                    <td><img src = "{{ url('storage/'.$principal->image) }}" alt="Principal image" style="height:100px"/></td>
                    <td>
                        <a href="{{route('admin.about.principals.delete',['id' => $principal->principal_id])}}"><button class="btn btn-danger">Delete</button></a>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
    @if(session()->has('alert'))
    <script>alert('{{ session()->get('alert') }}');</script>
    @endif
@endsection


