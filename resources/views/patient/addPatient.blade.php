@extends('layouts.dashboard.adminDashboard')

@section('title')
Add New Patient
@endSection


@section('main-content')

<form action={{ url('patient/store') }} method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="inputBox">
                            <input type="text" placeholder="full name" name="full_name">
                            <input type="number" name="patientPhone" placeholder="phone">
                        </div>

                        <div class="inputBox">
                            <input type="email" name="patientEmail" placeholder="your email">
                            <select name="doc_patient">
                                <option selected>Choose Doctor</option>
                                @foreach($doctors as $doctor)
                                <option value="{{$doctor->id}}">{{$doctor->first_name . ' '.$doctor->last_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="inputBox">
                            <select name="dis_patient" class="form-select form-control form-control-sm" aria-label="Default select example">
                                <option selected>Choose Disease</option>
                                @foreach($diseases as $disease)
                                <option value="{{$disease->id}}">{{$disease->disease_name}}</option>
                                @endforeach
                            </select>

                            <select name="app_patient" class="form-select form-control form-control-sm" aria-label="Default select example">
                                <option selected>Choose Appointment</option>
                                @foreach($appointments as $appointment)
                                <option value="{{$appointment->id}}">{{$appointment->available_appointment_time}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <input name="photo_patient" class="form-control  form-control-sm" type="file" id="formFile">
                        </div>

                        <textarea name="patient_description" id="" cols="30" rows="10" placeholder="message ( optional )"></textarea>

                        <input type="submit" value="make appointment" class="button">

                    </form>
@endSection