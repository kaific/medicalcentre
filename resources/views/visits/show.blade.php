@extends('layouts.medical')

@section('content')
    <a href="/visits" class="btn btn-dark">Go back</a>
    <div class="row">
        <div class="col-sm-2 border-right py-3">Date:</div>
        <div class="col-sm-10 py-3">{{date('d/m/Y', strtotime($visit->date))}}</div>
    </div>
    <div class="row border-top">
        <div class="col-sm-2 border-right py-3">Time:</div>
        <div class="col-sm-10 py-3">{{$visit->time}}</div>
    </div>
    <div class="row border-top">
        <div class="col-sm-2 border-right py-3">Duration:</div>
        <div class="col-sm-10 py-3">{{$visit->duration}}</div>
    </div>
    <div class="row border-top">
        <div class="col-sm-2 border-right py-3">Patient:</div>
        <div class="col-sm-10 py-3"><a href="/patients/{{$patient->id}}">{{$patient->name}}</a></div>
    </div>
    <div class="row border-top">
        <div class="col-sm-2 border-right py-3">Doctor:</div>
        <div class="col-sm-10 py-3"><a href="/doctors/{{$doctor->id}}">{{$doctor->name}}</a></div>
    </div>
    <div class="row border-top">
        <div class="col-sm-2 border-right py-3">Cost:</div>
        <div class="col-sm-10 py-3">{{$visit->cost}}</div>
    </div>
    {!!Form::open(['action' => ['VisitsController@destroy', $visit->id], 'method' => 'POST','onsubmit' => 'return confirmDelete()'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        <a href="/visits/{{$visit->id}}/edit" class="btn btn-primary">Edit</a>
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
@endsection