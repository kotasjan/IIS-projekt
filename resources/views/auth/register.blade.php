@extends('layouts.auth')

@section('content')

    <div class="card-header">{{ __('Register') }}</div>

    <div class="card-body">
        <form method="POST" action="{{ route('register') }}">
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
                <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>

                <div class="col-md-6">
                    <input id="surname" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                           name="surname" value="{{ old('surname') }}" required autofocus>

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
                           name="phone" value="{{ old('phone') }}" required>

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
                           value="{{ old('dateOfBirth') }}" required>

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
                           value="{{ old('address') }}" required autofocus>

                    @if ($errors->has('address'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                           placeholder="email@email.com" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password"
                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder=""
                           name="password" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="password-confirm"
                       class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                           required>
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>

            @if($errors->any())
                <div class="row collapse">
                    <ul class="alert-box warning radius">
                        @foreach($errors->all() as $error)
                            <li> {{ $error }} </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>
    </div>

@endsection
