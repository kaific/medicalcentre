@extends('layouts.medical')

@section('content')
    <div class="jumbotron">
        <h1>Create Doctor</h1>

        {{-- Laravel Collective Form --}}
        {!! Form::open(['action' => 'DoctorsController@store', 'method' => 'POST']) !!}
            <div class="form-group">
                <div class="row">
                    <div class="col col-sm-2 col-form-label">{{Form::label('name', 'Name:')}}</div>
                    <div class="col-sm-10">{{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}</div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2 col-form-label">{{Form::label('address', 'Address:')}}</div>
                <div class="col-sm-10">{{Form::text('address', '', ['class' => 'form-control', 'placeholder' => 'Address'])}}</div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2 col-form-label">{{Form::label('phone', 'Phone:')}}</div>
                <div class="col-sm-10">{{Form::text('phone', '', ['class' => 'form-control', 'placeholder' => 'Phone'])}}</div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2 col-form-label">{{Form::label('email', 'Email:')}}</div>
                <div class="col-sm-10">{{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Email address'])}}</div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2 col-form-label">{{Form::label('start_date', 'Start date:')}}</div>
                <div class="col-auto">{{Form::date('start_date', \Carbon\Carbon::now(), ['class' => 'form-control'])}}</div>
            </div>
            {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
        {{-- end of Laravel Collective Form --}}
    </div>
@endsection