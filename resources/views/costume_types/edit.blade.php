@extends('layouts.app')

@section('title', 'Edit costume type')

@section('headline', 'Edit costume type')

@section('content')

    <form method="POST" action="/costume_types/{{ $costume_type->id }}">
        @method('PATCH')
        @csrf

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                       name="name" value="{{ $costume_type->name }}" required autofocus>

                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="manufacturer" class="col-md-4 col-form-label text-md-right">{{ __('Manufacturer') }}</label>

            <div class="col-md-6">
                <input id="manufacturer" type="text"
                       class="form-control{{ $errors->has('manufacturer') ? ' is-invalid' : '' }}"
                       name="manufacturer" value="{{ $costume_type->manufacturer }}">

                @if ($errors->has('manufacturer'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('manufacturer') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="material" class="col-md-4 col-form-label text-md-right">{{ __('Material') }}</label>

            <div class="col-md-6">
                <input id="material" type="text"
                       class="form-control{{ $errors->has('material') ? ' is-invalid' : '' }}"
                       name="material" value="{{ $costume_type->material }}">

                @if ($errors->has('material'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('material') }}</strong>
                                    </span>
                @endif
            </div>
        </div>


        <div class="form-group row">
            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

            <div class="col-md-6">
                <input id="description" type="text"
                       class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                       name="description" value="{{ $costume_type->description }}">

                @if ($errors->has('description'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="category_id" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

            <div class="col-md-6">

                <select name="category_id" class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}" value="{{ $costume_type->category_id }}" required>
                    @foreach(\App\Category::all() as $category)

                        <option value="{{$category->id}}">{{ $category->name }}</option>

                    @endforeach

                </select>

                @if ($errors->has('category_id'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-4 col-xs-6 text-md-right"></div>
            <div class="col-md-6 col-xs-6">

                <div class="field">

                    <div class="control">
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>

                </div>
            </div>
        </div>

        @include('layouts.errors')
    </form>

@endsection