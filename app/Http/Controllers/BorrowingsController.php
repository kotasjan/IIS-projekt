<?php

namespace App\Http\Controllers;

use App\Borrowing;
use App\Employee;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BorrowingsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        if (Employee::find(Auth::id()) || User::find(Auth::id())->isAdmin)
            $borrowings = Borrowing::all();
        else
            $borrowings = Borrowing::where('client_id', \auth()->id())->get();

        return view('borrowings.borrowings', compact('borrowings'));
    }

    /**
     * @param Borrowing $borrowing
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Borrowing $borrowing)
    {
        //$this->authorize('view', $borrowing);

        return view('borrowings.show', compact('borrowing'));
    }

    public function create()
    {
        //$this->authorize('view', $borrowing);

        return view('borrowings.create');
    }

    public function store(Request $request)
    {

        $borrowing = Borrowing::where([['client_id', '=', Auth::id()], ['isCurrent', '=', true]])->first();

        $borrowing->update(array_merge($request->validate([
            'nameOfEvent' => ['required', 'string', 'max:255'],
            'dateOfRental' => 'required|date',
            'dateOfReturn' => 'required|date|after_or_equal:start_date',
        ]), ['isCurrent' => false]));

        $borrowing->update([
            'totalPrice' => $borrowing->totalPrice(),
        ]);

        Borrowing::create([
            'client_id' => Auth::id(),
            'dateOfRental' => date("Y-m-d H:i:s"),
        ]);

        return redirect('/borrowings');
    }

    public function finish(Borrowing $borrowing){
        $borrowing->update([
            'isFinished' => true,
        ]);

        $borrowing->releaseCostumes();
        $borrowing->releaseAccessories();
        return redirect('/borrowings');
    }

    public function confirm(Borrowing $borrowing){
        $borrowing->update([
            'isConfirmed' => true,
        ]);
        return redirect('/borrowings');
    }

    public function reject(Borrowing $borrowing){
        $borrowing->update([
            'isConfirmed' => false,
            'isFinished' => true,
        ]);

        $borrowing->releaseCostumes();
        $borrowing->releaseAccessories();
        return redirect('/borrowings');
    }


}
