@extends('layouts.dashboard.adminDashboard')

@section('title')
Add Doctor Specialty
@endSection


@section('main-content')

<form action={{ url('doctorSpecialty/store') }} method="POST">
    @csrf

    <div class="mb-3">
        <input class="form-control form-control-sm" name="specialty_name" type="text" placeholder="Specialty Name">
    </div>
    <div class="mb-3">
        <textarea name="specialty_description" placeholder="Specialty Description" style="width: 100%;" rows="10"></textarea>
    </div>

    <div class="mb-3">
        <input class="form-control form-control-sm btn btn-primary" type="submit">
    </div>
</form>
@endSection