<?php

namespace App\Http\Controllers;

use App\Costume;
use App\CostumeType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CostumeTypesController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $costume_types = DB::table('costume_types')->paginate(10);

        return view('costume_types.costume_types', compact('costume_types'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('costume_types.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(Request $request)
    {

        $costume_type  = CostumeType::create(request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'manufacturer' => ['required', 'string', 'max:255'],
            'material' => ['required', 'string', 'max:255'],
            'description' => ['string', 'max:255'],
            'category_id' => ['required', 'integer'],
        ]));

        return redirect('costume_types/' . $costume_type->id);
    }

    /**
     * @param CostumeType $costume_type
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(CostumeType $costume_type)
    {
        return view('costume_types.show', compact('costume_type'));
    }


    /**
     * @param CostumeType $costume_type
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(CostumeType $costume_type)
    {
        return view('costume_types.edit', compact('costume_type'));
    }


    public function update(CostumeType $costume_type)
    {

        $costume_type->update(
            request()->validate([
                'name' => ['required', 'string', 'max:255'],
                'manufacturer' => ['required', 'string', 'max:255'],
                'material' => ['required', 'string', 'max:255'],
                'description' => ['string', 'max:255'],
                'category_id' => ['required', 'integer'],
            ])
        );

        return view('costume_types.show', compact('costume_type'));
    }
}
