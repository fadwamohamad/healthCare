    @extends('layouts.dashboard.adminDashboard')

    @section('title')
    All Diseases
    @endSection


    @section('main-content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Appointment Name</th>
                <th scope="col">Available Appointment Time</th>
                <th scope="col">Delete</th>
                <th scope="col">Update</th>
            </tr>
        </thead>
        <tbody>
            @foreach($appointments as $appointment)
            <tr>
                <th scope="row">{{ $appointment->id}}</th>
                <td>{{ $appointment->appointment_name}}</td>
                <td>{{ $appointment->available_appointment_time}}</td>
                <td><a href={{ url( 'appointment/delete/' . $appointment->id )}} class="btn btn-danger">Delete</a></td>
                <td><a href={{ url( 'appointment/edit/' . $appointment->id )}} class="btn btn-warning">Update</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endSection