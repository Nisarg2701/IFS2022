@extends('admin.layouts.main')
@push('title', 'documents')

@php
    use App\Models\Documents;
    $documents = Documents::all();
@endphp

@section('main_content')
    <h1> Documents</h1>

    <div class="container">
{{-- Form Open --}}
{!! Form::open([
    'url' => url('admin/services/documents/add'),
    'method' => 'get',
    'class' => 'bv-form',
    'role' => 'form',
    'enctype' => 'multipart/form-data'
]) !!}
    {{-- documents --}}
{!! Form::text('documents', '', [
    'class' => 'applynow-form-elem',
    'id' => 'documents',
    'placeholder' => 'Add Document'
]) !!}
@error('name')
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
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>Documents</th>
                    <th></th>
                </tr>
            </thead>
            @foreach ($documents->reverse() as $document)
            <tbody>
                <tr>
                    <td>{{$document->documents}}</td>
                    <td>
                       <a href="{{route('admin.services.documents.delete',['id' => $document->documents_id])}}"><button class="btn btn-danger">Delete</button></a>
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
