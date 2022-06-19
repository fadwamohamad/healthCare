@extends('layouts.dashboard.adminDashboard')

@section('title')
All Doctors
@endSection


@section('main-content')
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Password</th>
            <th scope="col">Activate Doctor</th>
            <th scope="col">Delete</th>
            <th scope="col">Update</th>
        </tr>
    </thead>
    <tbody>
        @foreach($doctors as $doctor)
        <tr>
            <th scope="row">{{ $doctor->id}}</th>
            <td>{{ $doctor->first_name}}</td>
            <td>{{ $doctor->last_name}}</td>
            <td>{{ $doctor->phone}}</td>
            <td>{{ $doctor->doctor_password}}</td>
            <td><a href={{ url( 'doctor/activate/' . $doctor->id )}} class="btn btn-primary">Activate</a></td>
            <td><a href={{ url( 'doctor/delete/' . $doctor->id )}} class="btn btn-danger">Delete</a></td>
            <td><a href={{ url( 'doctor/edit/' . $doctor->id )}} class="btn btn-warning">Update</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endSection