@php
    use App\Models\Testimonials;
    $testimonials = Testimonials::all();
    if(isset($changes)){
    $values = [$changes->name,$changes->testimonials];
    $url = url('admin/about/testimonials/update/'.$changes->testimonial_id);
    $heading = "Enter any changes to the database";
    }
    else{
        $values = ['', ''];
        $url =  url('admin/about/testimonials/add');
        $heading = "Add any new Testimonial";
    }

@endphp

@extends('admin.layouts.main')
@push('title', 'Testimonials')

@section('main_content')
    <h1>About Us</h1>

    <h4>{{ $heading }}</h4>

    {{-- Form Open --}}
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

    {{-- testimonial --}}
    {!! Form::textarea('testimonial', $values[1], [
        'class' => '',
        'id' => 'testimonial',
        'placeholder' => 'Enter the Testimonial'
    ]) !!}
    @error('testimonial')
    {{ $message }}
    @enderror

    {{-- submit --}}
    @if (isset($changes))
        {!! Form::submit('Update', [
            'class' => ''
        ]) !!}
    @else
        {!! Form::submit('Submit', [
            'class' => ''
        ]) !!}
    @endif
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
                    <th>Testimonial</th>
                    <th>Visibility</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($testimonials->reverse() as $testimonial)
                    <tr>
                        <td>{{$testimonial->name}}</td>
                        <td>
                            <img src = "{{ url('storage/'.$testimonial->image) }}" alt="testimonial image"  style="height:10vh"/>
                        </td>
                        <td>{{$testimonial->testimonials}}</td>
                        <td>
                            @if ($testimonial->visibility == "yes")
                                <a href="{{route('admin.about.testimonials.visibility',['id' => $testimonial->testimonial_id])}}"><button class="btn btn-success">Active</button></a>
                            @else
                                <a href="{{route('admin.about.testimonials.visibility',['id' => $testimonial->testimonial_id])}}"><button class="btn btn-danger">Inactive</button></a>
                            @endif
                        </td>
                        <td>
                            <a href="{{route('admin.about.testimonials.edit',['id' => $testimonial->testimonial_id])}}"><button class="btn btn-info">Edit</button></a>
                        </td>
                        <td>
                            <a href="{{route('admin.about.testimonials.delete',['id' => $testimonial->testimonial_id])}}"><button class="btn btn-danger">Delete</button></a>
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
