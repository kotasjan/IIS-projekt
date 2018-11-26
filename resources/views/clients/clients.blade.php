@extends('layouts.app')

@section('title', 'Clients')

@section('headline', 'Clients')

@section('content')


    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th><b>Name</b></th>
            <th><b>Surname</b></th>
            <th><b>Email</b></th>
            <th><b>Legal entity</b></th>
            <th><b>Details</b></th>
        </tr>
        </thead>

        <tbody>
        @foreach($clients as $client)

            <tr>

                <td>
                    {{ $client->name }}
                </td>
                <td>
                    {{ $client->surname }}
                </td>
                <td>
                    {{ $client->email }}
                </td>
                <td>
                    {{ ($client->isLegalEntity) ? "Yes" : "No" }}
                </td>
                <td>
                    <a href="/clients/{{ $client->id }}">Link</a>
                </td>

            </tr>

        @endforeach
        </tbody>
    </table>

    {{ $clients->links() }}

@endsection