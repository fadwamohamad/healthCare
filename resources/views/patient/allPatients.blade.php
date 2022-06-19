@extends('layouts.dashboard.adminDashboard')

@section('title')
All Patients
@endSection


@section('main-content')
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">email</th>

        </tr>
    </thead>
    <tbody>
        @foreach($patients as $patient)
        <tr>
            <th scope="row">{{ $patient->id}}</th>
            <td>{{ $patient->name}}</td>
            <td>{{ $patient->email}}</td>

        </tr>
        @endforeach
    </tbody>
</table>
@endSection
