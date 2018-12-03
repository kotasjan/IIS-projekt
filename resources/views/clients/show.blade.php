@extends('layouts.app')

@section('title', 'Details')

@section('headline', 'Details')

@section('content')

    <div class="form-group row">
        <label class="col-md-2 col-xs-6 col-form-label text-md-right">Name</label>

        <div class="col-md-10 col-xs-6">
            <label class="col-md-4 col-form-label text-md-left font-weight-normal">{{ $client[0]->name }}</label>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-2 col-xs-6 col-form-label text-md-right">Surname</label>

        <div class="col-md-10 col-xs-6">
            <label class="col-md-4 col-form-label text-md-left font-weight-normal">{{ $client[0]->surname }}</label>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-xs-6 col-form-label text-md-right">Email</label>

        <div class="col-md-10 col-xs-6">
            <label class="col-md-4 col-form-label text-md-left font-weight-normal">{{ $client[0]->email }}</label>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-xs-6 col-form-label text-md-right">Phone</label>

        <div class="col-md-10 col-xs-6">
            <label class="col-md-4 col-form-label text-md-left font-weight-normal">{{ $client[0]->phone }}</label>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-xs-6 col-form-label text-md-right">Date of birth</label>

        <div class="col-md-10 col-xs-6">
            <label class="col-md-4 col-form-label text-md-left font-weight-normal">{{ $client[0]->dateOfBirth }}</label>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-xs-6 col-form-label text-md-right">Address</label>

        <div class="col-md- col-xs-6">
            <label class="col-md-4 col-form-label text-md-left font-weight-normal">{{ $client[0]->address }}</label>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2 col-xs-6">
            @if (Auth::user()->isAdmin && !(\App\Employee::find($client[0]->id)))
                <form method="POST" action="/employees">
                    @csrf

                    <input type="text" class="invisible"
                           name="id" value="{{ $client[0]->id }}" required>

                    <button class="btn btn-danger" type="submit">Promote</button>

                </form>
            @endif
        </div>

        <div class="col-md-2 col-xs-6">
            <form method="get" action="/clients/{{ $client[0]->id }}/edit">

                <button class="btn btn-primary" type="submit">Edit</button>
            </form>
        </div>
    </div>

@endsection