@php
use App\Models\RecruitmentInfo;
$recruitment = RecruitmentInfo::all();
if(isset($changes)){
    $values = [$changes->job, $changes->specification];
    $url = url('admin/careers/information/update/'.$changes->recruitment_id);
    $heading = "Enter any changes to the database";
}
else{
    $values = ['', ''];
    $url =  url('admin/careers/information/edit');
    $heading = "Add any new Job Requirements";
    }

@endphp


@extends('admin.layouts.main')
@push('title', 'Recruitment Information')
@section('main_content')

    <h2>Recruitment Information</h2>

    <div class="container">
    <div class="subcontainer">
    <h4>{{ $heading }}</h4>

    {!! Form::open([
        'url' => $url,
        'method' => 'get',
        'class' => 'bv-form',
        'role' => 'form',
    ]) !!}
        {!! Form::text('job', $values[0], [
            'placeholder' => 'Enter Title of Job',
            'class' => 'applynow-form-elem',
            'id' => 'job'
            ]) !!}
        @error('job')
        <small class="form-error"><br>&ensp;{{$message}}<br></small>
        @enderror
        {!! Form::textarea('specification', $values[1], [
            'placeholder' => 'Enter Specifications for the Job',
            'class' => 'textarea applynow-form-elem',
            'id' => 'specification'
            ]) !!}
        @error('specification')
        <small class="form-error"><br>&ensp;{{$message}}<br></small>
        @enderror
        @if (isset($changes))
            {!! Form::submit('Update', [
                'class' => ''
            ]) !!}
        @else
            {!! Form::submit('Submit', [
                'class' => 'applynow-form-elem'
            ]) !!}
        @endif

    {!! Form::close()!!}
    </div>
    <div class="subcontainer">
        <table class="table">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Visibility</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($recruitment as $info)
                    <tr>
                        <td>{{$info->job}}</td>
                        <td>{{$info->specification}}</td>
                        <td>
                            @if ($info->visibility == "yes")
                                <a href="{{route('admin.careers.visibility',['id' => $info->recruitment_id])}}"><button class="btn btn-success">Active</button></a>
                            @else
                                <a href="{{route('admin.careers.visibility',['id' => $info->recruitment_id])}}"><button class="btn btn-danger">Inactive</button></a>
                            @endif
                        </td>
                        <td>
                            <a href="{{route('admin.careers.informationedit',['id' => $info->recruitment_id])}}"><button class="btn btn-info">Edit</button></a>
                        </td>
                        <td>
                            <a href="{{route('admin.careers.informationdelete',['id' => $info->recruitment_id])}}"><button class="btn btn-danger">Delete</button></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>

@endsection
