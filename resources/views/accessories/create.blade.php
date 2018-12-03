@extends('layouts.app')

@section('title', 'Add accessory')

@section('headline', 'Add accessory')

@section('content')

    <form method="POST" action=".">

        @csrf

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                       name="name" value="{{ old('name') }}" required>

                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

            <div class="col-md-6">
                <input id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                       name="description" value="{{ old('description') }}" required>

                @if ($errors->has('description'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('description') }}</strong>
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
            <label for="employee_id" class="col-md-4 col-form-label text-md-right">{{ __('Employee') }}</label>

            <div class="col-md-6">

                <select name="employee_id" class="form-control{{ $errors->has('employee_id') ? ' is-invalid' : '' }}"
                        value="{{ \Illuminate\Support\Facades\Auth::id() }}" required>
                    @foreach(\App\Employee::all() as $employee)

                        <option value="{{$employee->id}}">{{ \App\User::find($employee->id)->name . ' ' . \App\User::find($employee->id)->surname }}</option>

                    @endforeach

                </select>

                @if ($errors->has('employee_id'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('employee_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="availability" class="col-md-4 col-form-label text-md-right">{{ __('Availability') }}</label>

            <div class="col-md-6">
                <input id="availability" type="checkbox"
                       class="form-control{{ $errors->has('availability') ? ' is-invalid' : '' }}"
                       style="width: auto;" name="availability" {{old('availability') ? 'checked' : ''}}>

                @if ($errors->has('availability'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('availability') }}</strong>
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