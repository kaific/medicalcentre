@extends('layouts.medical')

@section('content')
    <a href="/doctors" class="btn btn-dark">Go back</a>
    <div class="row">
        <div class="col-sm-2 border-right py-3">Name:</div>
        <div class="col-sm-10 py-3">{{$doctor->name}}</div>
    </div>
    <div class="row border-top">
        <div class="col-sm-2 border-right py-3">Address:</div>
        <div class="col-sm-10 py-3">{{$doctor->address}}</div>
    </div>
    <div class="row border-top">
        <div class="col-sm-2 border-right py-3">Phone:</div>
        <div class="col-sm-10 py-3">{{$doctor->phone}}</div>
    </div>
    <div class="row border-top">
        <div class="col-sm-2 border-right py-3">Email:</div>
        <div class="col-sm-10 py-3">{{$doctor->email}}</div>
    </div>
    
    <div class="row border-top">
        <div class="col-sm-2 border-right py-3">Start date:</div>
        <div class="col-sm-10 py-3">{{date('d/m/Y', strtotime($doctor->start_date))}}</div>
    </div>
    {!!Form::open(['action' => ['DoctorsController@destroy', $doctor->id], 'method' => 'POST','onsubmit' => 'return confirmDelete()'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        <a href="/doctors/{{$doctor->id}}/edit" class="btn btn-primary">Edit</a>
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
@endsection

{{-- Script for Confirmation Pop-Up after Delete button has been clicked --}}
@include('inc.confirmDelete')