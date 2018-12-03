@extends('layouts.app')

@section('title', 'Costumes')

@section('headline', 'Costumes')

@section('content')

    @if (\Illuminate\Support\Facades\Auth::user()->isAdmin ||  DB::table('employees')->find(\Illuminate\Support\Facades\Auth::id()))

        <form method="get" action="costumes/create" style="margin-bottom: 15px">

            <button type="submit" class="btn btn-primary">+ Add costume</button>

        </form>

    @endif

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th><b>Size</b></th>
            <th><b>Worn</b></th>
            <th><b>Date of manufacture</b></th>
            <th><b>Color</b></th>
            <th><b>Price/day</b></th>
            <th style="width: 30px"><b>Detail</b></th>
            <th style="width: 30px"><b>Availability</b></th>
            @if (Auth::user()->isAdmin || (\App\Employee::find(Auth::id())))
                <th style="width: 30px"><b>Delete</b></th>
            @endif
        </tr>
        </thead>

        <tbody>
        @foreach($costumes as $costume)

            <tr>

                <td>
                    {{ $costume->size }}
                </td>

                <td>
                    {{ $costume->worn . '%' }}
                </td>

                <td>
                    {{ $costume->dateOfManufacture }}
                </td>

                <td>
                    {{ $costume->color }}
                </td>

                <td>
                    {{ $costume->price . ' CZK' }}
                </td>

                <td style="text-align: center">
                    <form method="get"
                          action="/costume_types/{{ $costume_type->id }}/costumes/{{ $costume->id }}">

                        <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search"
                                                                            style="text-align: center; color: #ffffff"></span>
                        </button>

                    </form>
                </td>

                <td style="text-align: center">


                    @if($costume->availability)
                        <form method="POST"
                              action="/costume_types/{{ $costume_type->id }}/costumes/{{$costume->id}}/add">
                            @csrf
                            <button class="btn btn-success" type="submit"><span
                                        class="glyphicon glyphicon-shopping-cart"
                                        style="text-align: center; color: #ffffff"></span></button>

                        </form>
                    @else
                        <span class="glyphicon glyphicon-remove-sign" style="color: #606f7b"></span>
                    @endif

                </td>

                <td>
                    @if (Auth::user()->isAdmin || Auth::id() === $costume->employee_id)
                        <form method="POST" action="/costume_types/{{ $costume_type->id }}/costumes/{{$costume->id}}">

                            @method('DELETE')
                            @csrf

                            <div class="field">

                                <div class="control">
                                    <button type="submit" class="btn btn-danger"><span
                                                class="glyphicon glyphicon-remove"
                                                style="text-align: center; color: #ffffff"></span>
                                    </button>
                                </div>

                            </div>

                        </form>
                    @endif
                </td>

            </tr>

        @endforeach
        </tbody>
    </table>

    {{ $costumes->links() }}

@endsection