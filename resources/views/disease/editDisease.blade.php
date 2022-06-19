@extends('layouts.dashboard.adminDashboard')

@section('title')
Edit Disease
@endSection


@section('main-content')

<form action={{ url('disease/update') }} method="POST">
    @csrf

    <div class="mb-3">
        <input type="hidden" value={{$disease->id}} name="disease_id">
        <input class="form-control form-control-sm" value="{{$disease->disease_name}}" name="disease_name" type="text" placeholder="Disease Name">
    </div>
    <div class="mb-3">
        <textarea name="disease_description" class="form-control form-control-sm" style="width: 100%;" rows="10" placeholder="Disease Description">{{$disease->disease_description}}</textarea>
    </div>

    <div class="mb-3">
        <input class="form-control form-control-sm btn btn-primary" type="submit">
    </div>
</form>
@endSection