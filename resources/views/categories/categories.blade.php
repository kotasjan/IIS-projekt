@extends('layouts.app')

@section('title', 'Categories')

@section('headline', 'Categories')

@section('content')

    @if (\Illuminate\Support\Facades\Auth::user()->isAdmin || DB::table('employees')->find(\Illuminate\Support\Facades\Auth::id()))

        <form method="get" action="/categories/create" style="margin-bottom: 15px">

            <button type="submit" class="btn btn-primary">+ Add category</button>

        </form>

    @endif

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th><b>ID</b></th>
            <th><b>Name</b></th>
            <th><b>Description</b></th>
            <th><b>Details</b></th>
        </tr>
        </thead>

        <tbody>
        @foreach($categories as $category)

            <tr>

                <td>
                    {{ $category->id }}
                </td>
                <td>
                    {{ $category->name }}
                </td>
                <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                    {{ $category->description }}
                </td>
                <td>
                    <a href="/categories/{{ $category->id }}">Link</a>
                </td>

            </tr>

        @endforeach
        </tbody>
    </table>

    {{ $categories->links() }}

@endsection