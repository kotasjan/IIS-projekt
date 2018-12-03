@extends('layouts.app')

@section('title', 'Accessories')

@section('headline', 'Accessories')

@section('content')

    @if (\Illuminate\Support\Facades\Auth::user()->isAdmin ||  DB::table('employees')->find(\Illuminate\Support\Facades\Auth::id()))

        <form method="get" action="/costume_types/{{$costume_type->id}}/accessories/create" style="margin-bottom: 15px">

            <button type="submit" class="btn btn-primary">+ Add accessory</button>

        </form>

    @endif

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th><b>Name</b></th>
            <th><b>Date of manufacture</b></th>
            <th><b>Description</b></th>
            <th><b>Price/day</b></th>
            <th style="width: 30px"><b>Detail</b></th>
            <th style="width: 30px"><b>Availability</b></th>
            @if (Auth::user()->isAdmin || (\App\Employee::find(Auth::id())))
                <th style="width: 30px"><b>Delete</b></th>
            @endif
        </tr>
        </thead>

        <tbody>
        @foreach($accessories = DB::table('accessories')->where('type_id', '=', $costume_type->id)->paginate(10) as $accessory)

            <tr>

                <td>
                    {{ $accessory->name }}
                </td>

                <td>
                    {{ $accessory->dateOfManufacture }}
                </td>

                <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 200px;">
                    {{ $accessory->description }}
                </td>

                <td>
                    {{ $accessory->price . ' CZK' }}
                </td>

                <td style="text-align: center">
                    <form method="get"
                          action="/costume_types/{{ $costume_type->id }}/accessories/{{ $accessory->id }}">

                        <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search"
                                                                            style="text-align: center; color: #ffffff"></span>
                        </button>

                    </form>
                </td>

                <td style="text-align: center">


                    @if($accessory->availability)
                        <form method="POST"
                              action="/costume_types/{{ $costume_type->id }}/accessories/{{$accessory->id}}/add">
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
                    @if (Auth::user()->isAdmin || Auth::id() === $accessory->employee_id)
                        <form method="POST"
                              action="/costume_types/{{ $costume_type->id }}/accessories/{{$accessory->id}}">

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

    {{$accessories->links()}}

@endsection