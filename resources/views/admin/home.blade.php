@php
    use App\Models\Home;
    $homes = Home::all();
@endphp

@extends('admin.layouts.main')
@push('title', 'Home')
@section('main_content')
<h1>HOME</h1>
<div class="container">
{{-- Form Open --}}
{!! Form::open([
    'url' => url('admin/add'),
    'method' => 'post',
    'class' => 'bv-form',
    'role' => 'form',
    'enctype' => 'multipart/form-data'
]) !!}
{{-- Image --}}
{!! Form::label('Image', 'Image', ['class' => '']) !!}

{!! Form::file('image', [
    'class' => 'applynow-form-elem',
    'id' => 'image'
]) !!}
@error('image')
    <small class="form-error"><br>&ensp;{{$message}}<br></small>
@enderror
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
<table class="table">
    <thead>
        <tr>
            <th>Image</th>
            <th>visibility</th>
            <th><th>
        </tr>
    </thead>
    <tbody>
    @foreach ($homes->reverse() as $home)
        <tr>
            <td><img src = "{{ url('storage/'.$home->image) }}" alt="Home image"  style="height:10vh"/></td>
            <td>
                @if ($home->visibility == "yes")
                    <a href="{{route('admin.home.visibility',['id' => $home->id])}}"><button class="btn btn-success">Active</button></a>
                @else
                    <a href="{{route('admin.home.visibility',['id' => $home->id])}}"><button class="btn btn-danger">Inactive</button></a>
                @endif
            </td>
            <td>
                <a href="{{route('admin.home.delete',['id' => $home->id])}}"><button class="btn btn-danger">Delete</button></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
