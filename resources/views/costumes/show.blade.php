@extends('layouts.app')

@section('title', $costume_type->name)

@section('headline', $costume_type->name)

@section('content')

    <div class="form-group row">
        <label class="col-md-2 col-xs-6 col-form-label text-md-right">Price</label>

        <div class="col-md-10 col-xs-6">
            <label class="col-md-4 col-form-label text-md-left font-weight-normal">{{ $costume->price }}</label>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-xs-6 col-form-label text-md-right">Date of manufacture</label>

        <div class="col-md-10 col-xs-6">
            <label class="col-md-4 col-form-label text-md-left font-weight-normal">{{ $costume->dateOfManufacture }}</label>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-xs-6 col-form-label text-md-right">Worn</label>

        <div class="col-md-10 col-xs-6">
            <label class="col-md-4 col-form-label text-md-left font-weight-normal">{{ $costume->worn }}</label>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-xs-6 col-form-label text-md-right">Size</label>

        <div class="col-md-10 col-xs-6">
            <label class="col-md-4 col-form-label text-md-left font-weight-normal">{{ $costume->size }}</label>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-xs-6 col-form-label text-md-right">Color</label>

        <div class="col-md-10 col-xs-6">
            <label class="col-md-4 col-form-label text-md-left font-weight-normal">{{ $costume->color }}</label>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-xs-6 col-form-label text-md-right">Availability</label>

        <div class="col-md-10 col-xs-6">
            <label class="col-md-4 col-form-label text-md-left font-weight-normal">{{ ($costume->availability) ? 'Yes' : 'No' }}</label>
        </div>
    </div>

    @if (\App\Employee::find(\Illuminate\Support\Facades\Auth::id()) || \Illuminate\Support\Facades\Auth::user()->isAdmin)
        <div class="form-group row">
            <label class="col-md-2 col-xs-6 col-form-label text-md-right">Employee</label>

            <div class="col-md-10 col-xs-6">
                <label class="col-md-4 col-form-label text-md-left font-weight-normal">{{ (\App\User::find($costume->employee_id)->name) . ' ' . (\App\User::find($costume->employee_id)->surname) }}</label>
            </div>
        </div>
    @endif

    <div class="form-group row">
        <div class="col-md-2 col-xs-6 text-md-right"></div>

        <div class="col-md- col-xs-6">
            <form method="get" action="{{$costume->id}}/edit">

                <button class="btn btn-primary" type="submit">Edit</button>

            </form>
        </div>
    </div>

@endsection