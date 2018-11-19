@extends('layouts.app')

@section('content')

    <div class="h2">Dashboard</div>

    <div id="content">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        You are logged in!
    </div>
@endsection
