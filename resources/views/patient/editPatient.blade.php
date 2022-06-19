@extends('layouts.dashboard.adminDashboard')

@section('title')
Edit Patient
@endSection


@section('main-content')

<form action={{ url('patient/update') }} method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <input type="hidden" value="{{ $patient->id }}" name="patient_id">
        <input class="form-control form-control-sm" value="{{$patient->full_name}}" name="full_name" type="text" placeholder="Full Name">
    </div>
    <div class="mb-3">
        <input class="form-control form-control-sm" value="{{$patient->full_name}}" name="id_number" type="text" placeholder="ID Number">
    </div>

    <div class="mb-3">
        <select name="doc_patient" class="form-select form-control form-control-sm" aria-label="Default select example">
            <option selected>Choose New Doctor</option>
            @foreach($doctors as $doctor)
            <option value="{{$doctor->id}}">{{$doctor->first_name . ' '.$doctor->last_name}}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <select name="dis_patient" class="form-select form-control form-control-sm" aria-label="Default select example">
            <option selected>Choose New Disease</option>
            @foreach($diseases as $disease)
            <option value="{{$disease->id}}">{{$disease->disease_name}}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <select name="app_patient" class="form-select form-control form-control-sm" aria-label="Default select example">
            <option selected>Choose New Appointment</option>
            @foreach($appointments as $appointment)
            <option value="{{$appointment->id}}">{{$appointment->appointment_name . ' '.$appointment->available_appointment_time}}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <input name="photo_patient" class="form-control  form-control-sm" type="file" id="formFile">
    </div>


    <div class="mb-3">
        <input class="form-control form-control-sm btn btn-primary" type="submit">
    </div>
</form>
@endSection