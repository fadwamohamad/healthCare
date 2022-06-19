@extends('layouts.dashboard.adminDashboard')

@section('title')
Edit Appointment
@endSection


@section('main-content')

<form action={{ url('appointment/update') }} method="POST">
    @csrf

    <div class="mb-3">
        <input type="hidden" name="appointment_id" value={{$appointment->id}}>
        <input class="form-control form-control-sm" value="{{$appointment->appointment_name}}" name="appointment_name" type="text" placeholder="Appointment Name">
    </div>
    <div class="mb-3">
        <input class="form-control form-control-sm" value={{$appointment->available_appointment_time}} name="available_appointment_time" type="datetime-local" placeholder="Disease Name">
    </div>

    <div class="mb-3">
        <input class="form-control form-control-sm btn btn-primary" type="submit">
    </div>
</form>
@endSection