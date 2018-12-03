@extends('layouts.app')

@section('title', 'Add borrowing')

@section('headline', 'Add borrowing')

@section('content')

    <?php
    $borrowing = \App\Borrowing::where([['client_id', '=', \Illuminate\Support\Facades\Auth::id()], ['isCurrent', '=', true]])->first();
    $price = $borrowing->totalPrice();
    ?>

    <form method="POST" action="/borrowings">

        @csrf

        <div class="form-group row">
            <label for="nameOfEvent" class="col-md-4 col-form-label text-md-right">{{ __('Name of event') }}</label>

            <div class="col-md-6">
                <input id="nameOfEvent" type="text"
                       class="form-control{{ $errors->has('nameOfEvent') ? ' is-invalid' : '' }}"
                       name="nameOfEvent" value="{{ old('nameOfEvent') }}" required>

                @if ($errors->has('nameOfEvent'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nameOfEvent') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="dateOfRental"
                   class="col-md-4 col-form-label text-md-right">{{ __('Date of rental') }}</label>

            <div class="col-md-6">
                <input id="dateOfRental" type="date"
                       class="form-control{{ $errors->has('dateOfRental') ? ' is-invalid' : '' }}"
                       name="dateOfRental"
                       value="{{date('Y-m-d')}}" onChange="dateDiff()" required>

                @if ($errors->has('dateOfRental'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('dateOfRental') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="dateOfReturn"
                   class="col-md-4 col-form-label text-md-right">{{ __('Date of return') }}</label>

            <div class="col-md-6">
                <input id="dateOfReturn" type="date"
                       class="form-control{{ $errors->has('dateOfReturn') ? ' is-invalid' : '' }}"
                       name="dateOfReturn"
                       value="{{date('Y-m-d', strtotime('+1 day'))}}" onchange="dateDiff()" required>

                @if ($errors->has('dateOfReturn'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('dateOfReturn') }}</strong>
                    </span>
                @endif
            </div>
        </div>



        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">{{ __('Total price') }}</label>

            <div class="col-md-6">
                <label id="totalPrice" class="col-md-4 col-form-label text-md-left font-weight-bold">{{ $borrowing->totalPrice() . ' CZK' }}</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-4 col-xs-6 text-md-right"></div>
            <div class="col-md-6 col-xs-6">

                <div class="field">

                    <div class="control">
                        <button class="btn btn-primary" type="submit">Confirm order</button>
                    </div>

                </div>
            </div>
        </div>

        @include('layouts.errors')
    </form>

    <script>
        function dateDiff() {
            var date1 = new Date(document.getElementById("dateOfRental").value);
            var date2 = new Date(document.getElementById("dateOfReturn").value);
            var label = document.getElementById('totalPrice');

            if (date1 > date2){
                document.getElementById("dateOfReturn").setAttribute("class", "form-control is-invalid");
                alert("Date of return is wrong. Cannot be earlier than date of rental!");
                return;
            } else {
                document.getElementById("dateOfReturn").setAttribute("class", "form-control");
            }

            var difference = date2 - date1;

            var days = difference / (24 * 3600 * 1000);

            var finalprice = days * parseInt('<?php echo $price;?>');

            label.innerHTML = finalprice.toString() + " CZK";
        }
    </script>

@endsection