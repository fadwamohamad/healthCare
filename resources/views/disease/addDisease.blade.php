@extends('layouts.dashboard.adminDashboard')

@section('title')
Add New Disease
@endSection


@section('main-content')

<form action={{ url('disease/store') }} method="POST">
    @csrf

    <div class="mb-3">
        <input class="form-control form-control-sm" name="disease_name" type="text" placeholder="Disease Name">
    </div>
    <div class="mb-3">
        <textarea name="disease_description" class="form-control form-control-sm" style="width: 100%;" rows="10" placeholder="Disease Description"></textarea>
    </div>

    <div class="mb-3">
        <input class="form-control form-control-sm btn btn-primary" type="submit">
    </div>
</form>
@endSection