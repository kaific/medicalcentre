@extends('layouts.medical')

@section('content')
    <div class="container">
        <p class="text-right">
            <a href="/patients/create" class="btn btn-success">Add new patient</a>
        </p>
        <table class="table table-light">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Phone</th>
                <th scope="col">Email</th>
                <th scope="col">Insurance</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
                @if(count($patients) > 0)
                    @foreach($patients as $patient)
                        <tr>
                            <th scope="row">{{$patient->id}}</th>
                            <td><a href="/patients/{{$patient->id}}">{{$patient->name}}</a></td>
                            <td>{{$patient->address}}</td>
                            <td>{{$patient->phone}}</td>
                            <td>{{$patient->email}}</td>
                            <td>{{$patient->insurance}}</td>
                            <td>
                                {!! Form::open(['action' => ['PatientsController@destroy', $patient->id], 'method' => 'POST','onsubmit' => 'return confirmDelete()']) !!}
                                {{Form::hidden('_method', 'DELETE')}}
                                <a href="/patients/{{$patient->id}}" class="btn btn-secondary btn-sm">View</a>
                                <a href="/patients/{{$patient->id}}/edit" class="btn btn-primary btn-sm">Edit</a>
                                {{Form::submit('Delete', ['class' => 'btn btn-danger btn-sm'])}}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    @else <p>No patients found.</p>
                @endif
            </tbody>
        </table>
    </div>
@endsection