@extends('layouts.dashboard.adminDashboard')

@section('title')
    All Doctors
@endSection


@section('main-content')
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col"> appointment</th>
            <th scope="col">appointment details</th>
        </tr>
        </thead>
        <tbody>
        @foreach($appointments as $appointment)
            <tr>
                <th scope="row">{{ $appointment->id}}</th>
                <td>{{ $appointment->available_appointment_time}}</td>
                <td>{{ $appointment->appointment_name}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endSection
