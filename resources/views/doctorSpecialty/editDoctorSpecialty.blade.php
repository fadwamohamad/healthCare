@extends('layouts.dashboard.adminDashboard')

@section('title')
Edit Doctor Specialty
@endSection


@section('main-content')

<form action={{ url('doctorSpecialty/update') }} method="POST">
    @csrf

    <div class="mb-3">
        <input type="hidden" name="doctor_id" value={{ $doctorSpecialty->id}}>
        <input class="form-control form-control-sm" value="{{ $doctorSpecialty->specialty_name}}" name="specialty_name" type="text" placeholder="Specialty Name">
    </div>
    <div class="mb-3">
        <textarea name="specialty_description" placeholder="Specialty Description" style="width: 100%;" rows="10">{{ $doctorSpecialty->specialty_description}}
    </textarea>
    </div>

    <div class="mb-3">
        <input class="form-control form-control-sm btn btn-primary" type="submit">
    </div>
</form>
@endSection