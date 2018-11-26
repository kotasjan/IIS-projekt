<?php

namespace App\Http\Controllers;

use App\Costume;
use App\CostumeType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CostumesController extends Controller
{
    /**
     * @param CostumeType $costume_type
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(CostumeType $costume_type)
    {
        $costumes = DB::table('costumes')->where('type_id', '=', $costume_type->id)->paginate(10);

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
     * @param CostumeType $costume_type
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(Request $request, CostumeType $costume_type)
    {

        $costume = Costume::create(array_merge($request->validate([
            'price' => 'required|integer',
            'dateOfManufacture' => 'required|date',
            'worn' => 'required|integer',
            'size' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'employee_id' => 'required|integer',
            'availability',
        ]),['type_id' => $costume_type->id]));

        return view('costumes.show', compact('costume'), compact('costume_type'));
    }

    /**
     * @param Costume $costume
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(CostumeType $costume_type, Costume $costume)
    {

        return view('costumes.show', compact('costume'), compact('costume_type'));
    }


    /**
     * @param CostumeType $costumeType
     * @param Costume $costume
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(CostumeType $costumeType, Costume $costume)
    {
        return view('costumes.edit', compact('costume'));
    }

    public function update(Request $request, CostumeType $costume_type)
    {

        $costume = Costume::create(array_merge($request->validate([
            'price' => 'required|integer',
            'dateOfManufacture' => 'required|date',
            'worn' => 'required|integer',
            'size' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'employee_id' => 'required|integer',
            'availability',
        ]),['type_id' => $costume_type->id]));

        return view('costumes.show', compact('costume'), compact('costume_type'));
    }

    /**
     * @param Costume $costume
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(CostumeType $costumeType, Costume $costume)
    {
        //$this->authorize('delete', $costume);

        dump($costume);

        Costume::find($costume->id)->delete();

        return back();
    }

    public function add(CostumeType $costumeType, Costume $costume){
        return 'ahoj';
    }
}
