@php
    use App\Models\Awards;
    $awards = Awards::all();
    if(isset($changes)){
    $values = [$changes->name,$changes->description, $changes->image];
    $url = url('admin/about/awards/update/'.$changes->awards_id);
    $heading = "Enter any changes to the database";
    }
    else{
        $values = ['', '', ''];
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
    <div class="container">
        {{-- name --}}
        {!! Form::text('name', $values[0], [
            'class' => 'applynow-form-elem',
            'id' => 'name',
            'placeholder' => 'Add the name'
        ]) !!}
        @error('name')
        <small class="form-error"><br>&ensp;{{$message}}<br></small>
        @enderror
            <br>
        {{-- image --}}
        {!! Form::label('image', 'Image', ['class' => 'applynow-form-elem']) !!}

        {!! Form::file('image', [
            'class' => 'applynow-form-elem',
            'id' => 'image'
        ]) !!}
        @error('image')
        <small class="form-error"><br>&ensp;{{$message}}<br></small>
        @enderror
        @if (isset($changes))
            {!! Form::label('image', 'Choose an image if you want to replace', ['class' => 'applynow-form-elem']) !!}
            <img src = "{{ url('storage/'.$values[2]) }}" alt="award image"  style="height:10vh"/>
        @endif
        {{-- description --}}
        {!! Form::textarea('description', $values[1], [
            'class' => 'textarea applynow-form-elem',
            'id' => 'description',
            'placeholder' => 'Enter the description'
        ]) !!}
        @error('description')
        <small class="form-error"><br>&ensp;{{$message}}<br></small>
        @enderror
            <br>
        {{-- sumbit --}}
        {!! Form::submit('Submit', [
            'class' => 'applynow-form-elem'
        ]) !!}
        </div>
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
