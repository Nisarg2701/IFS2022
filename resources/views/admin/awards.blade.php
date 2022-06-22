@php
    use App\Models\Awards;
    $awards = Awards::all();
    if(isset($changes)){
    $values = [$changes->name,$changes->description];
    $url = url('admin/about/awards/update/'.$changes->awards_id);
    $heading = "Enter any changes to the database";
    }
    else{
        $values = ['', ''];
        $url =  url('admin/about/awards/add');
        $heading = "Add any new Awards";
    }
@endphp

@extends('admin.layouts.main')
@push('title', 'Awards')
@section('main_content')
<h2>Awards</h2>
<h4>{{ $heading }}</h4>

    {{-- Form open --}}
    {!! Form::open([
        'url' => $url,
        'method' => 'post',
        'role' => 'form',
        'class' => 'bv-form',
        'enctype' => 'multipart/form-data'
    ]) !!}

        {{-- name --}}
        {!! Form::text('name', $values[0], [
            'class' => '',
            'id' => 'name',
            'placeholder' => 'Add the name'
        ]) !!}
        @error('name')
        {{ $message }}
        @enderror

        {{-- image --}}
        {!! Form::label('image', 'Image', ['class' => '']) !!}

        {!! Form::file('image', [
            'class' => '',
            'id' => 'image'
        ]) !!}
        @error('image')
        {{ $message }}
        @enderror

        {{-- description --}}
        {!! Form::textarea('description', $values[1], [
            'class' => '',
            'id' => 'description',
            'placeholder' => 'Enter the description'
        ]) !!}
        @error('description')
        {{ $message }}
        @enderror

        {{-- sumbit --}}
        {!! Form::submit('Submit', [
            'class' => ''
        ]) !!}

    {{-- form close --}}
    {!! Form::close() !!}

    {{-- Data Table --}}
    <br>
      <div class="containerr">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($awards->reverse() as $award)
                    <tr>
                        <td>{{$award->name}}</td>
                        <td>
                            <img src = "{{ url('storage/'.$award->image) }}" alt="award image"  style="height:10vh"/>
                        </td>
                        <td>{{$award->description}}</td>
                        <td>
                            <a href="{{route('admin.about.awards.edit',['id' => $award->awards_id])}}"><button class="btn btn-info">Edit</button></a>
                        </td>
                        <td>
                            <a href="{{route('admin.about.awards.delete',['id' => $award->awards_id])}}"><button class="btn btn-danger">Delete</button></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    @if(session()->has('alert'))
        <script>alert('{{ session()->get('alert') }}');</script>
    @endif

@endsection
