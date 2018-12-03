@extends('layouts.app')

@section('title', 'Borrowings')

@section('headline', 'Borrowings')

@section('content')
    <h3 class="title">Your basket</h3>

    @foreach($borrowings as $borrowing)
        @if ($borrowing->isCurrent && ($borrowing->client_id == \Illuminate\Support\Facades\Auth::id()))
            @if($borrowing->numberOfCostumes > 0 || $borrowing->numberOfAccessories > 0)
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
                            <th style="width: 30px"><b>Remove</b></th>
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

                                <td>
                                    @if (Auth::user()->isAdmin || Auth::id() === $costume->employee_id)
                                        <form method="POST"
                                              action="/borrowings/{{ $borrowing->id }}/record_costumes/{{$record->id}}">

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
                            <th style="width: 30px"><b>Remove</b></th>

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

                                <td>
                                    @if (Auth::user()->isAdmin || Auth::id() === $accessory->employee_id)
                                        <form method="POST"
                                              action="/borrowings/{{ $borrowing->id }}/record_accessories/{{$record->id}}">

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

                @endif

                <form method="get" action="borrowings/create">

                    <div class="field">
                        <div class="control" style="margin-bottom: 30px;">
                            <button type="submit" class="btn btn-primary">Continue</button>
                        </div>
                    </div>

                </form>

            @else
                <p>Your basket is empty!</p>

            @endif

            @break
        @endif
    @endforeach

    <h3 class="title">Current borrowings</h3>

    <?php
    $userRules = \App\Employee::find(\Illuminate\Support\Facades\Auth::id()) || \App\User::find(\Illuminate\Support\Facades\Auth::id())->isAdmin;
    ?>

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th><b>Name of event</b></th>
            <th><b>Num. of costumes</b></th>
            <th><b>Num. of accessories</b></th>
            <th><b>Rental date</b></th>
            <th><b>Return date</b></th>
            <th><b>Total price</b></th>
            <th><b>Confirmed</b></th>
            <th><b>Details</b></th>
            @if($userRules)
                <th><b>Confirm</b></th>
                <th><b>Reject</b></th>
                <th><b>Finish</b></th>
            @endif
        </tr>
        </thead>
        <tbody>

        @foreach($borrowings as $borrowing)
            @if (!$borrowing->isCurrent && !$borrowing->isFinished)

                <tr>
                    <td>
                        {{ $borrowing->nameOfEvent }}
                    </td>
                    <td>
                        {{ $borrowing->numberOfCostumes }}
                    </td>
                    <td>
                        {{ $borrowing->numberOfAccessories }}
                    </td>
                    <td>
                        {{ $borrowing->dateOfRental }}
                    </td>
                    <td>
                        {{ $borrowing->dateOfReturn }}
                    </td>
                    <td>
                        {{ $borrowing->totalPrice }}
                    </td>
                    <td style="background-color: {{ ($borrowing->isConfirmed) ? '' : 'red'}}; text-align: center">
                        {{ ($borrowing->isConfirmed) ? 'Yes' : 'No'}}
                    </td>

                    <td style="text-align: center">
                        <form method="get"
                              action="/borrowings/{{ $borrowing->id }}">

                            <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search"
                                                                                style="text-align: center; color: #ffffff"></span>
                            </button>

                        </form>
                    </td>

                    @if($userRules)
                        <td style="text-align: center">
                            @if(!$borrowing->isConfirmed)
                                <form method="POST"
                                      action="/borrowings/{{ $borrowing->id }}/confirm">
                                    @csrf

                                    <button class="btn btn-info" type="submit"><span
                                                class="glyphicon glyphicon-ok"
                                                style="text-align: center; color: #ffffff"></span></button>

                                </form>
                            @endif
                        </td>

                        <td style="text-align: center">

                            <form method="POST"
                                  action="/borrowings/{{ $borrowing->id }}/reject">
                                @csrf

                                <button class="btn btn-danger" type="submit"><span
                                            class="glyphicon glyphicon-remove"
                                            style="text-align: center; color: #ffffff"></span></button>

                            </form>

                        </td>

                        <td style="text-align: center">
                            @if($borrowing->isConfirmed)
                                <form method="POST"
                                      action="/borrowings/{{ $borrowing->id }}/finish">
                                    @csrf

                                    <button class="btn btn-success" type="submit"><span
                                                class="glyphicon glyphicon-ok"
                                                style="text-align: center; color: #ffffff"></span></button>

                                </form>
                            @endif
                        </td>
                    @endif

                </tr>
            @endif
        @endforeach
        </tbody>
    </table>

    <h3 class="title">Past borrowings</h3>

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th><b>ID</b></th>
            <th><b>Name of event</b></th>
            <th><b>Num. of costumes</b></th>
            <th><b>Num. of accessories</b></th>
            <th><b>Rental date</b></th>
            <th><b>Return date</b></th>
            <th><b>Finished</b></th>
            <th><b>Details</b></th>
        </tr>
        </thead>

        <tbody>
        @foreach($borrowings as $borrowing)
            @if ($borrowing->isFinished)
                <tr>

                    <td>
                        {{ $borrowing->id }}
                    </td>
                    <td>
                        {{ $borrowing->nameOfEvent }}
                    </td>
                    <td>
                        {{ $borrowing->numberOfCostumes }}
                    </td>
                    <td>
                        {{ $borrowing->numberOfAccessories }}
                    </td>
                    <td>
                        {{ $borrowing->dateOfRental }}
                    </td>
                    <td>
                        {{ $borrowing->dateOfReturn }}
                    </td>
                    <td style="background-color: {{ ($borrowing->isConfirmed) ? '' : 'red'}}; text-align: center">
                        {{ ($borrowing->isConfirmed) ? "Yes" : "No"}}
                    </td>
                    <td style="text-align: center">
                        <form method="get"
                              action="/borrowings/{{ $borrowing->id }}">

                            <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search"
                                                                                style="text-align: center; color: #ffffff"></span>
                            </button>

                        </form>
                    </td>

                </tr>
            @endif
        @endforeach
        </tbody>
    </table>

@endsection