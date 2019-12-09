@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">

                    <div class="card-body">

                            <table id="table-appointments" class="table table-hover">
                                <tbody>
                                        <tr>
                                            <td>Date</td>
                                            <td>{{ $appointment->date }}</td>
                                        </tr>
                                        <tr>
                                            <td>Time</td>
                                            <td>{{ $appointment->time }}</td>
                                        </tr>
                                        <tr>
                                            <td>Patient</td>
                                            <td><a href="{{ route('admin.patients.show', $appointment->patient->user->id) }}">{{ $appointment->patient->user->name }} </a></td>
                                        </tr>
                                        <tr>
                                            <td>Doctor</td>
                                            <td><a href="{{ route('admin.doctors.show', $appointment->doctor->user->id) }}">{{ $appointment->doctor->user->name }} </a></td>
                                        </tr>
                                        <tr>
                                            <td>Duration</td>
                                            <td>{{ $appointment->duration}}</td>
                                        </tr>
                                        <tr>
                                            <td>Price</td>
                                            <td>€{{ $appointment->price}}</td>
                                        </tr>
                                    </tbody>
                            </table>
                            <a href="{{ route('admin.appointments.index', $appointment->id) }}" class="btn btn-default">Back</a>

                            <form style="display:inline-block;float: right;margin: 0 5px;" method="POST" action="{{ route('admin.appointments.destroy', $appointment->id) }}">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="form-control btn btn-danger float-right">Delete</button>
                            </form>

                            <a href="{{ route('admin.appointments.edit', $appointment->id) }}" class="btn btn-warning float-right">Edit</a>


                    </div>
            </div>
        </div>
    </div>
</div>

@endsection
