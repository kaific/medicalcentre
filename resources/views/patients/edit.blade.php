@extends('layouts.medical')

@section('content')
    <div class="jumbotron">
        <h1>Edit Patient</h1>

        {{-- Laravel Collective Form --}}
        {!!Form::open(['action' => ['PatientsController@update', $patient->id], 'method' => 'POST'])!!}
            <div class="form-group">
                <div class="row">
                    <div class="col col-sm-2 col-form-label">{{Form::label('name', 'Name:')}}</div>
                    <div class="col-sm-10">{{Form::text('name', $patient->name, ['class' => 'form-control', 'placeholder' => 'Name'])}}</div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2 col-form-label">{{Form::label('address', 'Address:')}}</div>
                <div class="col-sm-10">{{Form::text('address', $patient->address, ['class' => 'form-control', 'placeholder' => 'Address'])}}</div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2 col-form-label">{{Form::label('phone', 'Phone:')}}</div>
                <div class="col-sm-10">{{Form::text('phone', $patient->phone, ['class' => 'form-control', 'placeholder' => 'Phone'])}}</div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2 col-form-label">{{Form::label('email', 'Email:')}}</div>
                <div class="col-sm-10">{{Form::text('email', $patient->email, ['class' => 'form-control', 'placeholder' => 'Email address'])}}</div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2 col-form-label">{{Form::label('insurance', 'Insurance:')}}</div>
                <div class="col-sm-10">{{Form::text('insurance', $patient->insurance, ['class' => 'form-control', 'placeholder' => 'Insurance company'])}}</div>
            </div>

            {{-- to change request method from POST to PUT --}}
            {{Form::hidden('_method', 'PUT')}}

            {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
        {!!Form::close()!!}
        {{-- end of Laravel Collective Form --}}
    </div>
@endsection