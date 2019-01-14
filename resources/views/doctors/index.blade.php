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
                {{-- If there are any doctors in the database, display information of each --}}
                @if(count($doctors) > 0)
                    @foreach($doctors as $doctor)
                        <tr>
                            <th scope="row">{{$doctor->id}}</th>
                            <td><a href="/doctors/{{$doctor->id}}">{{$doctor->name}}</a></td>
                            <td>{{$doctor->address}}</td>
                            <td>{{$doctor->phone}}</td>
                            <td>{{$doctor->email}}</td>
                            {{-- Convert date from database to a more natural format --}}
                            <td>{{date('d/m/Y', strtotime($doctor->start_date))}}</td>
                            <td>
                                {{-- Form for delete button calling on destroy() function in controller
                                Calls on confirmDelete() function included below section upon submission to display 
                                confirmation message --}}
                                {!!Form::open(['action' => ['DoctorsController@destroy', $doctor->id], 'method' => 'POST','onsubmit' => 'return confirmDelete()'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{-- View and edit links inserted here to line up with Delete button --}}
                                <a href="/doctors/{{$doctor->id}}" class="btn btn-secondary btn-sm">View</a>
                                <a href="/doctors/{{$doctor->id}}/edit" class="btn btn-primary btn-sm">Edit</a>
                                {{Form::submit('Delete', ['class' => 'btn btn-danger btn-sm'])}}
                                {!!Form::close()!!}
                            </td>
                        </tr>
                    @endforeach
                    {{-- If the doctors table is empty, display message instead --}}
                    @else <p>No doctors found.</p>
                @endif
            </tbody>
        </table>
    </div>
@endsection

{{-- Script for Confirmation Pop-Up after Delete button has been clicked --}}
@include('inc.confirmDelete')