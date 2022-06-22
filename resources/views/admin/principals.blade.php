
@php
    use App\Models\Principals;
    $principals = Principals::all();
@endphp

@extends('admin.layouts.main')
@push('title', 'Principals')
@section('main_content')

<h1>Principals</h1>
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
    'class' => '',
    'id' => 'name',
    'placeholder' => 'add a name'
]) !!}
@error('name')
        {{ $message }}
@enderror
    {{-- image --}}
{!! Form::label('Image', 'Image', ['class' => '']) !!}

{!! Form::file('image', [
    'class' => '',
    'id' => 'image'
]) !!}
@error('image')
        {{ $message }}
@enderror
    {{-- submit --}}
{!! Form::submit('submit', [
    'class' => '',
    'id' => 'submit'
]) !!}
    {{-- Form Close --}}
{!! Form::close() !!}

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


