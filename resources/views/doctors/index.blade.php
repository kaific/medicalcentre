@extends('layouts.medical')

@section('content')
    <div class="container">
        <p class="text-right">
            <a href="/doctors/create" class="btn btn-success">Add new doctor</a>
        </p>
        <table class="table table-light">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Phone</th>
                <th scope="col">Email</th>
                <th scope="col">Start date</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
                @if(count($doctors) > 0)
                    @foreach($doctors as $doctor)
                        <tr>
                            <th scope="row">{{$doctor->id}}</th>
                            <td><a href="/doctors/{{$doctor->id}}">{{$doctor->name}}</a></td>
                            <td>{{$doctor->address}}</td>
                            <td>{{$doctor->phone}}</td>
                            <td>{{$doctor->email}}</td>
                            <td>{{date('d/m/Y', strtotime($doctor->start_date))}}</td>
                            <td>
                                {!!Form::open(['action' => ['DoctorsController@destroy', $doctor->id], 'method' => 'POST','onsubmit' => 'return confirmDelete()'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                <a href="/doctors/{{$doctor->id}}" class="btn btn-secondary btn-sm">View</a>
                                <a href="/doctors/{{$doctor->id}}/edit" class="btn btn-primary btn-sm">Edit</a>
                                {{Form::submit('Delete', ['class' => 'btn btn-danger btn-sm'])}}
                                {!!Form::close()!!}
                            </td>
                        </tr>
                    @endforeach
                    @else <p>No doctors found.</p>
                @endif
            </tbody>
        </table>
    </div>
@endsection

{{-- Script for Confirmation Pop-Up after Delete button has been clicked --}}
@include('inc.confirmDelete')