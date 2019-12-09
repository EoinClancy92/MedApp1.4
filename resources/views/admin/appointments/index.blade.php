@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                    <div class="card-header">
                        Appointments
                    
                    <a href="{{ route('admin.appointments.create') }}" class="btn btn-primary float-right">Add</a>
                    </div>
                    <div class="card-body">
                        @if (count($appointments) === 0)
                            <p>No appointments available</p>
                        @else
                            <table id="table-appointments" class="table table-hover">
                                <thead>
                                    <th>Date</th>
                                    <th>Doctor</th>
                                    <th>Patient</th>
                                    <th>Duration</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody>

                                    @foreach ($appointments as $appointment)
                                        <tr data-id="{{ $appointment->id }}">
                                            <td>{{ $appointment->date }}@if($appointment->cancelled) <span class="badge badge-danger" style="padding: 10px;margin: 0 5px">CANCELLED</span> @endif</td>
                                            <td><a href="{{ route('admin.doctors.show', $appointment->doctor->user->id) }}">{{ $appointment->doctor->user->name }} </a></td>
                                            <td><a href="{{ route('admin.patients.show', $appointment->patient->user->id) }}">{{ $appointment->patient->user->name }} </a></td>
                                            <td>{{ $appointment->duration}} minutes</td>
                                            <td>
                                                <a href="{{ route('admin.appointments.show', $appointment->id) }}" class="btn btn-default">View</a>
                                                <a href="{{ route('admin.appointments.edit', $appointment->id) }}" class="btn btn-warning">Edit</a>
                                            <form style="display:inline-block" method="POST" action="{{ route('admin.appointments.destroy', $appointment->id) }}">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button type="submit" class="form-control btn btn-danger">Delete</button>
                                            </form>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
            </div>
        </div>
    </div>
</div>

@endsection
