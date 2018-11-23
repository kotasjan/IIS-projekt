<?php

namespace App\Http\Controllers;

use App\Costume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CostumesController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $costumes = DB::table('costumes')->paginate(10);

        return view('costumes.costumes', compact('costumes'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('costumes.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(Request $request)
    {

        $costume = Costume::create(request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'manufacturer' => ['required', 'string', 'max:255'],
            'material' => ['required', 'string', 'max:255'],
            'description' => ['string', 'max:255'],
            'price' => ['required', 'integer'],
            'dateOfManufacture' => ['required', 'date'],
            'worn' => ['required', 'integer'],
            'size' => ['required', 'string', 'max:255'],
            'color' => ['required', 'string', 'max:255'],
            'employee_id' => ['required', 'integer'],
            'category_id' => ['required', 'integer'],
            'availability',
        ]));

        return back();
    }

    public function show(Costume $costume)
    {
        return view('costumes.show', compact('costume'));
    }
}
