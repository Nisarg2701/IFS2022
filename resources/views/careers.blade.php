@extends('layouts.main')
@push('title', 'Careers')

@php
    use App\Models\RecruitmentInfo;
    $recruitmentInfos = RecruitmentInfo::all();
    $jobs = array("Select your Job requirement");
    foreach($recruitmentInfos as $recruitmentInfo){
        if($recruitmentInfo->visibility=='yes')
        $jobs[$recruitmentInfo->job] = $recruitmentInfo->job;
    }
@endphp
@if (sizeof($jobs)>1)
@section('main_content')

<h1 class="heading">We are Hiring</h1>
<div class="carrer-container container ">

        <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <script>var jobId = [];
                    var specificationValues = [];
            </script>
            @php
                $count = 0;
                foreach ($recruitmentInfos as $recruitmentInfo)
                {   $count++;
                    if($recruitmentInfo->visibility=="yes")
                        echo '<label class="btn btn-secondary active" onclick="ShowHideDiv('.$count.')"
                                name="job" id="'. $recruitmentInfo->job . '">

                            <script>
                                jobId['.$count.'] = "'.$recruitmentInfo->job.'";
                                specificationValues['.$count.'] = "'.$recruitmentInfo->specification.'";
                            </script>

                            '.$recruitmentInfo->job.'
                            </label>';
                    else {
                        continue;
                    }
                }
            @endphp
        </div>
        <br>

            <p>

            <div id="description" class="container" style="display: none">
                <h2 class="carrer-spec heading">Specifications</h2>
                    <div class="container card-text" id="specifications"></div>
            </div>
            </p>

            <div id="form" class="carrer-form container card col-md-6">
                <div class="application">
                    <h2>Application</h2>
                    {!! Form::open([
                        'url' => url('/careers/application'),
                        'class' => 'bv-form',
                        'method' => 'post',
                        'role' => 'form',
                        'enctype' => 'multipart/form-data'
                    ]) !!}

                    {!! Form::text('first_name', '', [
                        'id' => 'first_name',
                        'class' => 'applynow-form-elem',
                        'placeholder' => 'First Name'
                    ]) !!}
                    @error('first_name')
                    <small class="form-error"><br>&ensp;{{$message}}<br></small>
                    @enderror

                    {!! Form::text('last_name', '', [
                        'id' => 'last_name',
                        'class' => 'applynow-form-elem',
                        'placeholder' => 'Last Name'
                    ]) !!}
                    @error('last_name')
                    <small class="form-error"><br>&ensp;{{$message}}<br></small>
                    @enderror

                    {!! Form::text('email', '', [
                        'id' => 'email',
                        'class' => 'applynow-form-elem',
                        'placeholder' => 'Email'
                    ]) !!}
                    @error('email')
                    <small class="form-error"><br>&ensp;{{$message}}<br></small>
                    @enderror

                    {!! Form::text('phone_number', '', [
                        'id' => 'phone_number',
                        'class' => 'applynow-form-elem',
                        'placeholder' => 'Phone Number'
                    ]) !!}
                    @error('phone_number')
                    <small class="form-error"><br>&ensp;{{$message}}<br></small>
                    @enderror

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
                    {!! Form::select('job', $jobs, "0",[
                        "id" => 'job',
                        'class' => 'applynow-form-elem'
                    ]) !!}
                    @error('job')
                    <small class="form-error"><br>&ensp;{{$message}}<br></small>
                    @enderror

                    {!! Form::text('current_salary', '', [
                        'id' => 'current_salary',
                        'class' => 'applynow-form-elem',
                        'placeholder' => 'Current Salary'
                    ]) !!}
                    @error('current_salary')
                    <small class="form-error"><br>&ensp;{{$message}}<br></small>
                    @enderror

                    {!! Form::text('expected_salary', '', [
                        'id' => 'expected_salary',
                        'class' => 'applynow-form-elem',
                        'placeholder' => 'Expectected Salary'
                    ]) !!}
                    @error('expected_salary')
                    <small class="form-error"><br>&ensp;{{$message}}<br></small>
                    @enderror
                     <br>
                    {!! Form::label('Resume', 'Resume',[
                        'for' => 'Resume',
                        'class' => 'form-check-label'
                        ]) !!}

                    {!! Form::file('resume', [
                        'id' => 'resume',
                        'class' => 'applynow-form-elem'
                    ]) !!}
                    @error('resume')
                    <small class="form-error"><br>&ensp;{{$message}}<br></small>
                    @enderror

                    {!! Form::submit('Submit',[
                        'class' => 'applynow-form-elem'
                        ]) !!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        @if(session()->has('alert'))
        <script>alert('{{ session()->get('alert') }}');</script>
        @endif

    <script>
        function ShowHideDiv(count){
            var hello = document.getElementById(jobId[count]);
            var description = document.getElementById('description');
            description.style.display = hello.click? "block" : "none";
            var specifications = document.getElementById('specifications');
            specifications.innerHTML = specificationValues[count];
         }
    </script>
@endsection

@else
@section('main_content')
<h2 class="not-hiring">We are not hiring</h2>
@endsection
@endif
