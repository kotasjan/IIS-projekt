<?php

namespace App\Http\Controllers;

use App\Borrowing;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BorrowingsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        if(Employee::find(Auth::id()))
            $borrowings = Borrowing::all();
        else
            $borrowings = Borrowing::where('client_id', \auth()->id())->get();

        return view('borrowings.borrowings', compact('borrowings'));
    }

    /**
     * @param Borrowing $borrowing
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Borrowing $borrowing)
    {
        //$this->authorize('view', $borrowing);

        return view('borrowings.show', compact('borrowing'));
    }
}
