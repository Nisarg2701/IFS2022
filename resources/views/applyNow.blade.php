@extends('layouts.main')
@push('title', 'Apply Now')
@php
  use App\Models\Services;
  $services = Services::all();
  $loans = array("Select your Loan requirement");
  foreach ($services as $service) {
      $loans["$service->name"] = $service->name;
  }
@endphp
@section('main_content')
<h1 class="heading">Apply Now</h1>
    {{-- Form start --}}
    {!! Form::open([
        'url' => url('/apply/application'),
        'class' => 'bv-form',
        'method' => 'get',
        'role' => 'form',
        ]) !!}

        <div class="applynow-container">

            <div class="subcontainer container">
                <img class="applynow-img container" src="{{ url('images\slide-img-1.jpg') }}"/>
            </div>
            <div class="subcontainer container">

                {{-- First Name --}}
                {!! Form::text('first_name', '',[
                    'id' => 'first_name',
                    'class' => 'applynow-form-elem',
                    'placeholder' => 'First Name'
                    ]) !!}
                @error('first_name')
                    <small class="form-error"><br>&ensp;{{$message}}<br></small>
                @enderror
                {{-- Last Name --}}
                {!! Form::text('last_name', '',[
                    'id' => 'last_name',
                    'class' => 'applynow-form-elem',
                    'placeholder' => 'Last Name'
                    ]) !!}
                @error('last_name')
                <small class="form-error"><br>&ensp;{{$message}}<br></small>
                @enderror
                {{-- Gender --}}
                <div class="applynow-radio-group applynow-form-elem">
                    {!! Form::label('gender', 'Gender:&nbsp;',[
                        'class' => 'applynow-form-elem'
                        ]) !!}
                    <div class="form-check form-check-inline">
                        {{-- Male --}}
                        {!! Form::radio('gender', 'Male', true,[
                            'id' => 'Male',
                            'class' => 'form-check-input'
                            ]) !!}
                        {!! Form::label('gender', 'Male',[
                            'for' => 'Male',
                            'class' => 'form-check-label'
                            ]) !!}

                    </div>
                    <div class="form-check form-check-inline">
                        {{-- Female --}}
                        {!! Form::radio('gender', 'Female', false,[
                            'id' => 'Female',
                            'class' => 'form-check-input'
                            ]) !!}
                        {!! Form::label('gender', 'Female',[
                            'for' => 'Female',
                            'class' => 'form-check-label'
                            ]) !!}
                    </div>
                    <div class="form-check form-check-inline">
                        {{-- Other --}}
                        {!! Form::radio('gender', 'Other', false,[
                            'id' => 'Other',
                            'class' => 'form-check-input'
                            ]) !!}
                        {!! Form::label('gender', 'Other',[
                            'for' => 'Other',
                            'class' => 'form-check-label'
                            ]) !!}
                    </div>
                </div>

                {{-- Email --}}
                {!! Form::text('email', '',[
                    'id' => 'email',
                    'class' => 'applynow-form-elem',
                    'placeholder' => 'Email',
                    ]) !!}
                @error('email')
                <small class="form-error"><br>&ensp;{{$message}}<br></small>
                @enderror

                {{-- Phone Number --}}
                {!! Form::text('phone_number', '',[
                'id' => 'phone_number',
                'class' => 'applynow-form-elem',
                'placeholder' => 'Phone Number',
                ]) !!}
                @error('phone_number')
                <small class="form-error"><br>&ensp;{{$message}}<br></small>
                @enderror
                {{-- Requirement --}}
                {!! Form::select('requirement', $loans, "0",[
                    "id" => 'requirement',
                    'class' => 'applynow-form-elem'
                ]) !!}
                @error('requirement')
                <small class="form-error"><br>&ensp;{{$message}}<br></small>
                @enderror

                {{-- Category --}}
                {!! Form::select('category', [
                    '0' => 'Select a category',
                    'Salaried' => 'Salaried',
                    'Self-employed' => 'Self-employed',
                    'Professional' => 'Professional'
                ], "0",[
                    "id" => 'category',
                    'class' => 'applynow-form-elem'
                ]) !!}
                @error('category')
                <small class="form-error"><br>&ensp;{{$message}}<br></small>
                @enderror

                {{-- Job Description --}}
                {!! Form::textarea('occupation','',[
                    'id' => 'occupation',
                    'class' => 'textarea applynow-form-elem',
                    'placeholder' =>'Job Description (Occupation)'
                ]) !!}
                @error('occupation')
                <small class="form-error"><br>&ensp;{{$message}}<br></small>
                @enderror

                {{-- Current Address --}}
                {!! Form::textarea('current_address','',[
                    'id' => 'current_address',
                    'class' => 'textarea applynow-form-elem',
                    'placeholder' =>'Current Address'
                ]) !!}
                @error('current_address')
                <small class="form-error"><br>&ensp;{{$message}}<br></small>
                @enderror
                <br>
                {{-- Apply Now --}}
                {!! Form::submit('Apply Now',[
                    'class' => 'applynow-form-elem'
                    ]) !!}
            </div>

        </div>

    {!! Form::close() !!}
    @if(session()->has('alert'))
        <script>alert('{{ session()->get('alert') }}');</script>
    @endif
@endsection
