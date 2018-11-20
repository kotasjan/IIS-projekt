@extends('layouts.app')

@section('content')

    <div class="h2">Clients</div>

    <div id="content">

        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th><b>ID</b></th>
                <th><b>Name</b></th>
                <th><b>Surname</b></th>
                <th><b>Email</b></th>
                <th><b>Legal entity</b></th>
                <th><b>View</b></th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)

                <tr>

                    <td>
                        {{ $user->id }}
                    </td>
                    <td>
                        {{ $user->name }}
                    </td>
                    <td>
                        {{ $user->surname }}
                    </td>
                    <td>
                        {{ $user->email }}
                    </td>
                    <td>
                        {{ (\App\Client::find($user->id)->isLegalEntity) ? 'Yes' : 'No'}}
                    </td>
                    <td>
                        <a href="/clients/{{ $user->id }}">Link</a>
                    </td>

                </tr>

            @endforeach
            </tbody>
        </table>

        {{ $users->links() }}

    </div>
@endsection