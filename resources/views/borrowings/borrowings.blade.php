@extends('layouts.app')

@section('title', 'Borrowings')

@section('headline', 'Borrowings')

@section('content')
    <h3 class="title">Current borrowing</h3>

    @foreach($borrowings as $borrowing)
        @if ($borrowing->isCurrent)
            @if($borrowing->numberOfCostumes > 0 || $borrowing->numberOfaccessories > 0)

                <p>Hi!</p>

            @else
                <p>Your basket is empty!</p>
            @endif
            @break
        @endif
    @endforeach

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
            @if (!$borrowing->isCurrent)
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
                    <td>
                        {{ $borrowing->isFinished }}
                    </td>
                    <td>
                        <a href="/borrowings/{{ $borrowing->id }}">Link</a>
                    </td>

                </tr>
            @endif
        @endforeach
        </tbody>
    </table>

@endsection