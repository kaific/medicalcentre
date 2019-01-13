@extends('layouts.medical')

@section('content')
    <div class="container">
        <p class="text-right">
            <a href="/visits/create" class="btn btn-success">Schedule new visit</a>
        </p>
        <table class="table table-light">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
                <th scope="col">Duration</th>
                <th scope="col">Patient</th>
                <th scope="col">Doctor</th>
                <th scope="col">Cost</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
                @if(count($visits) > 0)
                    @foreach($visits as $visit)
                        <tr>
                            <th scope="row">{{$visit->id}}</th>
                            <td>{{date('d/m/Y', strtotime($visit->date))}}</td>
                            <td>{{$visit->time}}</td>
                            <td>{{$visit->duration}}</td>
                            <td><a href="/patients/{{$visit->patient_id}}">{{$patients->where('id',$visit->patient_id)->first()->name}}</td>
                            <td><a href="/doctors/{{$visit->doctor_id}}">{{$doctors->where('id', $visit->doctor_id)->first()->name}}</a></td>
                            <td>{{$visit->cost}}</td>
                            <td>
                                {!! Form::open(['action' => ['VisitsController@destroy', $visit->id], 'method' => 'POST','onsubmit' => 'return confirmDelete()']) !!}
                                {{Form::hidden('_method', 'DELETE')}}
                                <a href="/visits/{{$visit->id}}" class="btn btn-secondary btn-sm">View</a>
                                <a href="/visits/{{$visit->id}}/edit" class="btn btn-primary btn-sm">Edit</a>
                                {{Form::submit('Delete', ['class' => 'btn btn-danger btn-sm'])}}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    @else <p>No visits found.</p>
                @endif
            </tbody>
        </table>
    </div>
@endsection