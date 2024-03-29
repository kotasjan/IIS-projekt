@extends('layouts.app')

@section('title', 'Add costume')

@section('headline', 'Add costume')

@section('content')

    <form method="POST" action=".">

        @csrf

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
                <select name="size" class="form-control{{ $errors->has('size') ? ' is-invalid' : '' }}"
                        value="{{ old('size') }}" required>

                    <option value="XS">XS</option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                    <option value="XXL">XXL</option>
                    <option value="XXXL">XXXL</option>

                </select>

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