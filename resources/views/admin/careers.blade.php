 @php
    use App\Models\Recruitment;
    $recruitment = Recruitment::all();
@endphp

@extends('admin.layouts.main')
@push('title', 'Recruitment Application')
@section('main_content')
<h2>Recruitment Application</h2>
<br>
      <div class="containerr">
        <table class="table">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Ph.No</th>
                    <th>Job</th>
                    <th>Current Salary</th>
                    <th>Expected Salary</th>
                    <th>Gender</th>
                    <th>Resume</th>
                    <th>TimeStamp</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($recruitment->reverse() as $info)
                    <tr>
                        <td>{{$info->first_name}}</td>
                        <td>{{$info->last_name}}</td>
                        <td>{{$info->email}}</td>
                        <td>{{$info->phone_number}}</td>
                        <td>{{$info->job}}</td>
                        <td>{{$info->current_salary}}</td>
                        <td>{{$info->expected_salary}}</td>
                        <td>{{$info->gender}}</td>
                        <td>
                            <a href="{{route('admin.careers.download',['id' => $info->recruitment_id])}}"><button class="btn btn-info">Download</button></a>
                        </td>
                        <td>{{$info->created_at}}</td>
                        <td>
                            <a href="{{route('admin.careers.delete',['id' => $info->recruitment_id])}}"><button class="btn btn-danger">Delete</button></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
