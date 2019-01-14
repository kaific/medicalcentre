@extends('layouts.medical')

@section('content')
    <a href="/patients" class="btn btn-dark">Go back</a>
    <div class="row">
        <div class="col-sm-2 border-right py-3">Name:</div>
        <div class="col-sm-10 py-3">{{$patient->name}}</div>
    </div>
    <div class="row border-top">
        <div class="col-sm-2 border-right py-3">Address:</div>
        <div class="col-sm-10 py-3">{{$patient->address}}</div>
    </div>
    <div class="row border-top">
        <div class="col-sm-2 border-right py-3">Phone:</div>
        <div class="col-sm-10 py-3">{{$patient->phone}}</div>
    </div>
    <div class="row border-top">
        <div class="col-sm-2 border-right py-3">Email:</div>
        <div class="col-sm-10 py-3">{{$patient->email}}</div>
    </div>
    
    <div class="row border-top">
        <div class="col-sm-2 border-right py-3">Insurance</div>
        <div class="col-sm-10 py-3">{{$patient->insurance}}</div>
    </div>
    {!!Form::open(['action' => ['PatientsController@destroy', $patient->id], 'method' => 'POST','onsubmit' => 'return confirmDelete()'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        <a href="/patients/{{$patient->id}}/edit" class="btn btn-primary">Edit</a>
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
@endsection