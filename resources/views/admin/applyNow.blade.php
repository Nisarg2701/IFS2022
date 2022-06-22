@php
    $i = 0;
@endphp

@extends('admin.layouts.main')
@push('title', 'Apply Now')
@section('main_content')


<h1 class="main_heading">Apply Now</h1>

      <br>
      <div class="containerr">
        <table class="table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Requirement</th>
                    <th>Category</th>
                    <th>Ph.No</th>
                    {{-- <th>Email</th>
                    <th>Occupation</th>
                    <th>Gender</th>
                    <th>Current Address</th> --}}
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($applynow_info->reverse() as $info)
                    <tr>
                        <td>{{$info->created_at}}</td>
                        <td>{{$info->first_name ." ".$info->last_name}}</td>
                        <td>{{$info->requirement}}</td>
                        <td>{{$info->category}}</td>
                        <td>{{$info->phone_number}}</td>
                        {{-- <td>{{$info->email}}</td>
                        <td>{{$info->occupation}}</td>
                        <td>{{$info->gender}}</td>
                        <td>{{$info->current_address}}</td> --}}
                        <td>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#ModalCreate-{{ $i }}" id="view">view</button>
                            @include('modal.viewApplyNowInfo')
                            @php $i++; @endphp
                        </td>
                        <td>
                            <a href="{{route('admin.applynow.delete',['id' => $info->inquiry_id])}}"><button class="btn btn-danger" id="delete">Delete</button></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row">
            <span class="pagination">{{$applynow_info->onEachSide(1)->links()}}</span>
        </div>
    </div>


@endsection