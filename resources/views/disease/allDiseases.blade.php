@extends('layouts.dashboard.adminDashboard')

@section('title')
All Diseases
@endSection


@section('main-content')
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Disease Name</th>
            <th scope="col">Disease Description</th>
            <th scope="col">Delete</th>
            <th scope="col">Update</th>
        </tr>
    </thead>
    <tbody>
        @foreach($diseases as $disease)
        <tr>
            <th scope="row">{{ $disease->id}}</th>
            <td>{{ $disease->disease_name}}</td>
            <td>{{ $disease->disease_description}}</td>
            <td><a href={{ url( 'disease/delete/' . $disease->id )}} class="btn btn-danger">Delete</a></td>
            <td><a href={{ url( 'disease/edit/' . $disease->id )}} class="btn btn-warning">Update</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endSection