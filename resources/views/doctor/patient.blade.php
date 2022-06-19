@extends('layouts.dashboard.adminDashboard')

@section('title')
    All my Patient
@endSection


@section('main-content')
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col"> Name</th>
            <th scope="col"> show details</th>
        </tr>
        </thead>
        <tbody>
        @foreach($patients as $patient)
            <tr>
                <th scope="row">{{ $patient->id}}</th>
                <td>{{ $patient->name}}</td>
                <td> <a href="{{route('doctor.appointment',$patient->id)}}" class="btn btn-secondary">Show</a></td>

            </tr>
        @endforeach
        </tbody>
    </table>
@endSection
