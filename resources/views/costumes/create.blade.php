@extends('layouts.app')

@section('title', 'Add costume')

@section('headline', 'Add costume')

@section('content')

    <form method="POST" action="/costumes">

        @csrf

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                       name="name" value="{{ old('name') }}" required autofocus>

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
                       name="manufacturer" value="{{ old('manufacturer') }}" required>

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
                <input id="material" type="text" class="form-control{{ $errors->has('material') ? ' is-invalid' : '' }}"
                       name="material" value="{{ old('material') }}" required>

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
                       name="description" value="{{ old('description') }}">

                @if ($errors->has('description'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

            <div class="col-md-6">
                <input id="price" type="text" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}"
                       name="price" value="{{ old('price') }}" required>

                @if ($errors->has('price'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="dateOfManufacture"
                   class="col-md-4 col-form-label text-md-right">{{ __('Date of manufacture') }}</label>

            <div class="col-md-6">
                <input id="dateOfManufacture" type="date"
                       class="form-control{{ $errors->has('dateOfManufacture') ? ' is-invalid' : '' }}"
                       name="dateOfManufacture"
                       value="{{ old('dateOfManufacture') }}" required>

                @if ($errors->has('dateOfManufacture'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('dateOfManufacture') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="worn" class="col-md-4 col-form-label text-md-right">{{ __('Worn (%)') }}</label>

            <div class="col-md-6">
                <input id="worn" type="text" class="form-control{{ $errors->has('worn') ? ' is-invalid' : '' }}"
                       name="worn" value="{{ old('worn') }}" required>

                @if ($errors->has('worn'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('worn') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="size" class="col-md-4 col-form-label text-md-right">{{ __('Size') }}</label>

            <div class="col-md-6">
                <input id="size" type="text" class="form-control{{ $errors->has('size') ? ' is-invalid' : '' }}"
                       name="size" value="{{ old('size') }}" required>

                @if ($errors->has('size'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('size') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="color" class="col-md-4 col-form-label text-md-right">{{ __('Color') }}</label>

            <div class="col-md-6">
                <input id="color" type="text" class="form-control{{ $errors->has('color') ? ' is-invalid' : '' }}"
                       name="color" value="{{ old('color') }}" required>

                @if ($errors->has('color'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('color') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="category_id" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

            <div class="col-md-6">

                <select name="category_id" class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}" value="{{ old('category_id') }}" required>
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
            <label for="availability" class="col-md-4 col-form-label text-md-right">{{ __('Availability') }}</label>

            <div class="col-md-6">
                <input id="availability" type="checkbox"
                       class="form-control{{ $errors->has('availability') ? ' is-invalid' : '' }}"
                       style="width: auto;" name="availability">

                @if ($errors->has('availability'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('availability') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <input id="employee_id" type="text" class="invisible"
               name="employee_id" value="{{ \Illuminate\Support\Facades\Auth::id() }}" required>

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