@extends('layouts.app')

@section('title', 'Details')

@section('headline', 'Details')

@section('content')

    <div class="form-group row">
        <label class="col-md-2 col-xs-6 col-form-label text-md-right">Name</label>

        <div class="col-md-10 col-xs-6">
            <label class="col-md-4 col-form-label text-md-left font-weight-normal">{{ $category->name }}</label>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-2 col-xs-6 col-form-label text-md-right">Description</label>

        <div class="col-md-10 col-xs-6">
            <label class="col-md-4 col-form-label text-md-left font-weight-normal">{{ $category->description }}</label>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2 col-xs-6 text-md-right"></div>

        <div class="col-md- col-xs-6">
            <form method="get" action="/categories/{{ $category->id }}/edit">

                <button class="btn btn-primary" type="submit">Edit</button>

            </form>
        </div>
    </div>

@endsection