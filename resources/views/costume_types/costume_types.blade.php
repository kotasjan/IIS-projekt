@extends('layouts.app')

@section('title', 'Costumes')

@section('headline', 'Costumes')

@section('content')

    @if (\Illuminate\Support\Facades\Auth::user()->isAdmin ||  DB::table('employees')->find(\Illuminate\Support\Facades\Auth::id()))

        <form method="get" action="/costume_types/create" style="margin-bottom: 15px">

            <button type="submit" class="btn btn-primary">+ Add costume type</button>

        </form>

    @endif

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th><b>Name</b></th>
            <th><b>Manufacturer</b></th>
            <th><b>Material</b></th>
            <th><b>Category</b></th>
            <th><b>Description</b></th>
            <th><b>Detail</b></th>
        </tr>
        </thead>

        <tbody>
        @foreach($costume_types as $costume_type)

            <tr>

                <td>
                    {{ $costume_type->name }}
                </td>
                <td>
                    {{ $costume_type->manufacturer }}
                </td>
                <td>
                    {{ $costume_type->material }}
                </td>
                <td>
                    {{ \App\Category::find($costume_type->category_id)->name }}
                </td>
                <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 200px;">
                    {{ $costume_type->description }}
                </td>

                <td style="text-align: center">
                    <form method="get"
                          action="/costume_types/{{ $costume_type->id }}">

                        <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search" style="text-align: center; color: #ffffff"></span></button>

                    </form>
                </td>

            </tr>

        @endforeach
        </tbody>
    </table>

    {{ $costume_types->links() }}

@endsection