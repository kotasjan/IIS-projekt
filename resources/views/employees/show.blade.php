@extends('layouts.app')

@section('title', 'Details')

@section('headline', 'Details')

@section('content')

    <div class="form-group row">
        <label class="col-md-2 col-xs-6 col-form-label text-md-right">Name</label>

        <div class="col-md-10 col-xs-6">
            <label class="col-md-4 col-form-label text-md-left font-weight-normal">{{ $employee[0]->name }}</label>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-2 col-xs-6 col-form-label text-md-right">Surname</label>

        <div class="col-md-10 col-xs-6">
            <label class="col-md-4 col-form-label text-md-left font-weight-normal">{{ $employee[0]->surname }}</label>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-xs-6 col-form-label text-md-right">Email</label>

        <div class="col-md-10 col-xs-6">
            <label class="col-md-4 col-form-label text-md-left font-weight-normal">{{ $employee[0]->email }}</label>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-xs-6 col-form-label text-md-right">Phone</label>

        <div class="col-md-10 col-xs-6">
            <label class="col-md-4 col-form-label text-md-left font-weight-normal">{{ $employee[0]->phone }}</label>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-xs-6 col-form-label text-md-right">Date of birth</label>

        <div class="col-md-10 col-xs-6">
            <label class="col-md-4 col-form-label text-md-left font-weight-normal">{{ $employee[0]->dateOfBirth }}</label>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-xs-6 col-form-label text-md-right">Address</label>

        <div class="col-md- col-xs-6">
            <label class="col-md-4 col-form-label text-md-left font-weight-normal">{{ $employee[0]->address }}</label>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-xs-6 col-form-label text-md-right">Bank account</label>

        <div class="col-md- col-xs-6">
            <label class="col-md-4 col-form-label text-md-left font-weight-normal">{{ $employee[0]->bankAccountNumber }}</label>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2 col-xs-6 text-md-right">

        </div>

        <div class="col-md- col-xs-6">
            <form method="get" action="/employees/{{ $employee[0]->id }}/edit">

                <button class="btn btn-primary" type="submit">Edit</button>
            </form>
        </div>
    </div>

@endsection