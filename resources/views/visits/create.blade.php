@extends('layouts.medical')

@section('content')
    <div class="jumbotron">
        <h1>Schedule Visit</h1>

        {{-- Laravel Collective Form --}}
        {!!Form::open(['action' => 'VisitsController@store', 'method' => 'POST'])!!}
            <div class="form-group">
                <div class="row">
                    <div class="col col-sm-2 col-form-label">
                        {{Form::label('date', 'Date:')}}
                    </div>
                    <div class="col-auto">
                        {{Form::date('date', \Carbon\Carbon::now(), ['class' => 'form-control'])}}
                    </div>
                </div>
                <div class="row">
                    <div class="col col-sm-2 col-form-label">
                        {{Form::label('time', 'Time:')}}
                    </div>
                    <div class="col-sm-10">
                        {{Form::text('time', '', ['class' => 'form-control', 'placeholder' => '00:00:00'])}}
                    </div>
                </div>
                <div class="row">
                    <div class="col col-sm-2 col-form-label">
                        {{Form::label('duration', 'Duration:')}}
                    </div>
                    <div class="col-sm-10">
                        {{Form::text('duration', '', ['class' => 'form-control', 'placeholder' => '00:00:00'])}}
                    </div>
                </div>
                <div class="row">
                    <div class="col col-sm-2 col-form-label">
                        {{Form::label('patient_id', 'Patient_id:')}}
                    </div>
                    <div class="col-sm-10">
                        {{Form::select('patient_id', $patients, null, ['class' => 'form-control'])}}
                    </div>
                </div>
                <div class="row">
                    <div class="col col-sm-2 col-form-label">
                        {{Form::label('doctor_id', 'Doctor_id:')}}
                    </div>
                    <div class="col-sm-10">
                        {{Form::select('doctor_id', $doctors, null, ['class' => 'form-control'])}}
                    </div>
                </div>
                <div class="row">
                    <div class="col col-sm-2 col-form-label">
                        {{Form::label('cost', 'Cost:')}}
                    </div>
                    <div class="col-sm-10">
                        {{Form::number('cost', '', ['class' => 'form-control', 'placeholder' => '0.00'])}}
                    </div>
                </div>
            </div>
            
            {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
        {!!Form::close()!!}
        {{-- end of Laravel Collective Form --}}
    </div>
@endsection