@extends('layouts.app')

@section('title', 'Costume type details')

@section('headline', 'Costume type details')

@section('content')

    <div class="form-group row">
        <label class="col-md-2 col-xs-6 col-form-label text-md-right">Name</label>

        <div class="col-md-10 col-xs-6">
            <label class="col-md-4 col-form-label text-md-left font-weight-normal">{{ $costume_type->name }}</label>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-2 col-xs-6 col-form-label text-md-right">Manufacturer</label>

        <div class="col-md-10 col-xs-6">
            <label class="col-md-4 col-form-label text-md-left font-weight-normal">{{ $costume_type->manufacturer }}</label>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-xs-6 col-form-label text-md-right">Material</label>

        <div class="col-md-10 col-xs-6">
            <label class="col-md-4 col-form-label text-md-left font-weight-normal">{{ $costume_type->material }}</label>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-xs-6 col-form-label text-md-right">Description</label>

        <div class="col-md-10 col-xs-6">
            <label class="col-md-4 col-form-label text-md-left font-weight-normal">{{ $costume_type->description }}</label>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-xs-6 col-form-label text-md-right">Category</label>

        <div class="col-md-10 col-xs-6">
            <label class="col-md-4 col-form-label text-md-left font-weight-normal">{{ \App\Category::find($costume_type->category_id)->name }}</label>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2 col-xs-6 text-md-right"></div>

        <div class="col-md- col-xs-6">
            <form method="get" action="/costume_types/{{ $costume_type->id }}/edit">

                <button class="btn btn-primary" type="submit">Edit</button>

            </form>
        </div>
    </div>

    <hr>

    <h2 class="title">Costumes</h2>

    @if (\Illuminate\Support\Facades\Auth::user()->isAdmin ||  DB::table('employees')->find(\Illuminate\Support\Facades\Auth::id()))

        <form method="get" action="/costume_types/{{$costume_type->id}}/costumes/create" style="margin-bottom: 15px">

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
            <th><b>Price</b></th>
            <th style="width: 30px"><b>Detail</b></th>
            <th style="width: 30px"><b>Availability</b></th>
            @if (Auth::user()->isAdmin || (\App\Employee::find(Auth::id())))
                <th style="width: 30px"><b>Delete</b></th>
            @endif
        </tr>
        </thead>

        <tbody>
        @foreach($costumes = DB::table('costumes')->where('type_id', '=', $costume_type->id)->paginate(5, ['*'], 'costumes_page') as $costume)

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
                              action="/borrowings/{{ DB::table('borrowings')->where(['client_id' => Auth::id(), 'isCurrent' => '1'])->first()->id }}/record_costumes">
                            @csrf

                            <input type = "hidden" name = "costume_id" value = "{{$costume->id}}" />
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

    {{$costumes->appends(array_except(Request::query(), 'costumes_page'))->links()}}

    <h2 class="title">Accessories</h2>

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
            <th><b>Price</b></th>
            <th style="width: 30px"><b>Detail</b></th>
            <th style="width: 30px"><b>Availability</b></th>
            @if (Auth::user()->isAdmin || (\App\Employee::find(Auth::id())))
                <th style="width: 30px"><b>Delete</b></th>
            @endif
        </tr>
        </thead>

        <tbody>
        @foreach($accessories = DB::table('accessories')->where('type_id', '=', $costume_type->id)->paginate(5, ['*'], 'accessories_page') as $accessory)

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
                              action="/borrowings/{{ DB::table('borrowings')->where(['client_id' => Auth::id(), 'isCurrent' => '1'])->first()->id }}/record_accessories">
                            @csrf

                            <input type = "hidden" name = "accessory_id" value = "{{$accessory->id}}" />
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

    {{$accessories->appends(array_except(Request::query(), 'accessories_page'))->links()}}

@endsection