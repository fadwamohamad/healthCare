@extends('layouts.dashboard.adminDashboard')

@section('title')
Edit Doctor
@endSection


@section('main-content')

<form action={{ url('doctor/update') }} method="POST">
    @csrf

    <div class="mb-3">
        <input type="hidden" name="doctor_id" value={{ $doctor->id}}>
        <input class="form-control form-control-sm" value="{{ $doctor->first_name}}" name="first_name" type="text" placeholder="First Name">
    </div>
    <div class="mb-3">
        <input class="form-control form-control-sm" value="{{ $doctor->last_name}}" name="last_name" type="text" placeholder="Last Name">
    </div>
    <div class="mb-3">
        <input class="form-control form-control-sm" value="{{ $doctor->phone}}" name="phone" type="text" placeholder="Phone">
    </div>

    <div class="mb-3">
        <input class="form-control form-control-sm" value="{{ $doctor->doctor_password}}" name="doctor_password" type="password" placeholder="Doctor Password">
    </div>

    <div class="mb-3">
        <input class="form-control form-control-sm btn btn-primary" type="submit">
    </div>
</form>
@endSection