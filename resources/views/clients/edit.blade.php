@extends('layouts.app')

@section('title', 'Edit profile')

@section('headline', 'Edit profile')

@section('content')

    <form method="POST" action="/clients/{{ $client[0]->id }}">
        @method('PATCH')
        @csrf

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                       name="name" value="{{ $client[0]->name }}" required autofocus>

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
                       name="surname" value="{{ $client[0]->surname }}" required autofocus>

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
                       name="phone" value="{{ $client[0]->phone }}" required>

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
                       value="{{ $client[0]->dateOfBirth }}" required>

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
                       value="{{ $client[0]->address }}" required autofocus>

                @if ($errors->has('address'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
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
            <form method="POST" action="/clients/{{ $client[0]->id }}">

                @method('DELETE')
                @csrf

                <div class="field">

                    <div class="control">
                        <button type="submit" class="btn btn-danger">Delete account</button>
                    </div>

                </div>

            </form>
        </div>
    </div>
@endsection