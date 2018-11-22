@extends('layouts.app')

@section('title', 'Edit profile')

@section('headline', 'Edit profile')

@section('content')

    <form method="POST" action="/employees/{{ $employee[0]->id }}">
        @method('PATCH')
        @csrf

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                       name="name" value="{{ $employee[0]->name }}" required autofocus>

                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>

            <div class="col-md-6">
                <input id="surname" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                       name="surname" value="{{ $employee[0]->surname }}" required autofocus>

                @if ($errors->has('surname'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="phone"
                   class="col-md-4 col-form-label text-md-right">{{ __('Telephone (with prefix)') }}</label>

            <div class="col-md-6">
                <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                       name="phone" value="{{ $employee[0]->phone }}" required>

                @if ($errors->has('phone'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Date of birth') }}</label>

            <div class="col-md-6">
                <input id="dateOfBirth" type="date"
                       class="form-control{{ $errors->has('dateOfBirth') ? ' is-invalid' : '' }}" name="dateOfBirth"
                       value="{{ $employee[0]->dateOfBirth }}" required>

                @if ($errors->has('dateOfBirth'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('dateOfBirth') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

            <div class="col-md-6">
                <input id="address" type="text"
                       class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address"
                       value="{{ $employee[0]->address }}" required autofocus>

                @if ($errors->has('address'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">{{ __('Bank account') }}</label>

            <div class="col-md-6">
                <input id="bankAccountNumber" type="text" class="form-control{{ $errors->has('bankAccountNumber') ? ' is-invalid' : '' }}"
                       placeholder="1111111111/0800" name="bankAccountNumber" value="{{ $employee[0]->bankAccountNumber }}" required>

                @if ($errors->has('bankAccountNumber'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('bankAccountNumber') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-4 col-xs-6 text-md-right"></div>
            <div class="col-md-6 col-xs-6">

                <div class="field">

                    <div class="control">
                        <button class="btn btn-primary" type="submit">Save changes</button>
                    </div>

                </div>
            </div>
        </div>


        @include('layouts.errors')
    </form>
    <div class="form-group row">
        <div class="col-md-4 col-xs-6 text-md-right"></div>
        <div class="col-md-6 col-xs-6">

            @if (Auth::user()->isAdmin)
                <form method="POST" action="/employees/{{ $employee[0]->id }}">

                    @method('DELETE')
                    @csrf

                    <div class="field">

                        <div class="control">
                            <button type="submit" class="btn btn-danger">Dismiss</button>
                        </div>

                    </div>

                </form>
            @endif
        </div>
    </div>
@endsection