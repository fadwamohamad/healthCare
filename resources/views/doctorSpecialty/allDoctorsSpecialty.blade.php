@extends('layouts.dashboard.adminDashboard')

@section('title')
All doctor Specialties
@endSection


@section('main-content')
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Specialty Name</th>
            <th scope="col">Specialty Description</th>
            <th scope="col">Delete</th>
            <th scope="col">Update</th>
        </tr>
    </thead>
    <tbody>
        @foreach($doctorSpecialties as $doctorSpecialty)
        <tr>
            <th scope="row">{{ $doctorSpecialty->id}}</th>
            <td>{{ $doctorSpecialty->specialty_name}}</td>
            <td>{{ $doctorSpecialty->specialty_description}}</td>
            <td><a href={{ url( 'doctorSpecialty/delete/' . $doctorSpecialty->id )}} class="btn btn-danger">Delete</a></td>
            <td><a href={{ url( 'doctorSpecialty/edit/' . $doctorSpecialty->id )}} class="btn btn-warning">Update</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endSection