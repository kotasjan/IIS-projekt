@extends('layouts.app')

@section('title', 'Details')

@section('headline', 'Details')

@section('content')

    <div class="form-group row">
        <label class="col-md-2 col-xs-6 col-form-label text-md-right">Name of event</label>

        <div class="col-md-10 col-xs-6">
            <label class="col-md-4 col-form-label text-md-left font-weight-normal">{{ $borrowing->nameOfEvent }}</label>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-2 col-xs-6 col-form-label text-md-right">Number of costumes</label>

        <div class="col-md-10 col-xs-6">
            <label class="col-md-4 col-form-label text-md-left font-weight-normal">{{ $borrowing->numberOfCostumes }}</label>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-xs-6 col-form-label text-md-right">Number of accessories</label>

        <div class="col-md-10 col-xs-6">
            <label class="col-md-4 col-form-label text-md-left font-weight-normal">{{ $borrowing->numberOfAccessories }}</label>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-xs-6 col-form-label text-md-right">Date of rental</label>

        <div class="col-md-10 col-xs-6">
            <label class="col-md-4 col-form-label text-md-left font-weight-normal">{{ $borrowing->dateOfRental }}</label>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-xs-6 col-form-label text-md-right">Date of return</label>

        <div class="col-md-10 col-xs-6">
            <label class="col-md-4 col-form-label text-md-left font-weight-normal">{{ $borrowing->dateOfReturn }}</label>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-xs-6 col-form-label text-md-right">Total price</label>

        <div class="col-md-10 col-xs-6">
            <label class="col-md-4 col-form-label text-md-left font-weight-bold">{{ $borrowing->totalPrice . ' CZK'}}</label>
        </div>
    </div>

    <hr>

    @if($borrowing->numberOfCostumes > 0)

    <h5 class="title">Costumes</h5>

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th><b>Name</b></th>
            <th><b>Size</b></th>
            <th><b>Worn</b></th>
            <th><b>Date of manufacture</b></th>
            <th style="width: 150px"><b>Price/day</b></th>
            <th style="width: 30px"><b>Detail</b></th>
        </tr>
        </thead>

        <tbody>
        @foreach($records = \App\RecordCostume::where('borrowing_id', $borrowing->id)->get() as $record)
            <?php
            $costume = \App\Costume::where('id', $record->costume_id)->first();
            $costume_type = \App\CostumeType::where('id', $costume->type_id)->first();
            ?>
            <tr>

                <td>
                    {{ $costume_type->name }}
                </td>

                <td>
                    {{ $costume->dateOfManufacture }}
                </td>

                <td>
                    {{ $costume->size }}
                </td>

                <td>
                    {{ $costume->worn . '%' }}
                </td>

                <td>
                    {{ $costume->price . ' CZK' }}
                </td>

                <td style="text-align: center">
                    <form method="get"
                          action="/costume_types/{{ $costume_type->id }}/costumes/{{ $costume->id }}">

                        <button class="btn btn-primary" type="submit"><span
                                    class="glyphicon glyphicon-search"
                                    style="text-align: center; color: #ffffff"></span>
                        </button>

                    </form>
                </td>

            </tr>

        @endforeach
        </tbody>
    </table>


    @endif

    @if($borrowing->numberOfAccessories > 0)

        <h5 class="title">Accessories</h5>

        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th><b>Name</b></th>
                <th><b>Date of manufacture</b></th>
                <th><b>Description</b></th>
                <th style="width: 150px"><b>Price/day</b></th>
                <th style="width: 30px"><b>Detail</b></th>

            </tr>
            </thead>

            <tbody>
            @foreach($records = \App\RecordAccessory::where('borrowing_id', $borrowing->id)->get() as $record)
                <?php
                $accessory = \App\Accessory::where('id', $record->accessory_id)->first();
                $costume_type = \App\CostumeType::where('id', $accessory->type_id)->first();
                ?>
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

                            <button class="btn btn-primary" type="submit"><span
                                        class="glyphicon glyphicon-search"
                                        style="text-align: center; color: #ffffff"></span>
                            </button>

                        </form>
                    </td>

                </tr>

            @endforeach
            </tbody>
        </table>

    @endif

@endsection