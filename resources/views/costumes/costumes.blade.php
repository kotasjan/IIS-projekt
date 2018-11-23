@extends('layouts.app')

@section('title', 'Costumes')

@section('headline', 'Costumes')

@section('content')

    @if (\Illuminate\Support\Facades\Auth::user()->isAdmin ||  DB::table('employees')->find(\Illuminate\Support\Facades\Auth::id()))

        <form method="get" action="/costumes/create">

            <button type="submit" class="btn btn-primary">+ Add costume</button>

        </form>

    @endif

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th><b>ID</b></th>
            <th><b>Name</b></th>
            <th><b>Manufacturer</b></th>
            <th><b>Worn</b></th>
            <th><b>Size</b></th>
            <th><b>Price</b></th>
            <th><b>Detail</b></th>
        </tr>
        </thead>

        <tbody>
        @foreach($costumes as $costume)

            <tr>

                <td>
                    {{ $costume->id }}
                </td>
                <td>
                    {{ $costume->name }}
                </td>
                <td>
                    {{ $costume->manufacturer }}
                </td>
                <td>
                    {{ $costume->worn . '%' }}
                </td>
                <td>
                    {{ $costume->size }}
                </td>
                <td>
                    {{ $costume->price }}
                </td>
                <td>
                    <a href="/costumes/{{ $costume->id }}">Link</a>
                </td>

            </tr>

        @endforeach
        </tbody>
    </table>

    {{ $costumes->links() }}

@endsection