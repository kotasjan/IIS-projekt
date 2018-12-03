<?php

namespace App\Http\Controllers;

use App\Accessory;
use App\CostumeType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccessoriesController extends Controller
{

    /**
     * @param CostumeType $costume_type
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(CostumeType $costume_type)
    {
        $accessories = DB::table('accessories')->where('type_id', '=', $costume_type->id)->paginate(10);

        return view('accessories.accessories', compact('accessories'), compact('costume_type'));
    }

    public function create()
    {
        return view('accessories.create');
    }

    /**
     * @param Request $request
     * @param CostumeType $costume_type
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(Request $request, CostumeType $costume_type)
    {

        if($request->has('availability'))
            $availability = true;
        else
            $availability = false;

        Accessory::create(array_merge($request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['string', 'max:255'],
            'price' => 'required|integer',
            'dateOfManufacture' => 'required|date',
            'employee_id' => 'required|integer',
        ]), ['type_id' => $costume_type->id, 'availability' => $availability]));

        return redirect('/costume_types/' . $costume_type->id);
    }

    /**
     * @param CostumeType $costume_type
     * @param Accessory $accessory
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(CostumeType $costume_type, Accessory $accessory)
    {
        return view('accessories.show', compact('accessory'), compact('costume_type'));
    }


    /**
     * @param CostumeType $costumeType
     * @param Accessory $accessory
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(CostumeType $costumeType, Accessory $accessory)
    {
        return view('accessories.edit', compact('accessory'));
    }

    public function update(Request $request, CostumeType $costume_type, Accessory $accessory)
    {

        if($request->has('availability'))
            $availability = true;
        else
            $availability = false;

        $accessory->update(array_merge($request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['string', 'max:255'],
            'price' => 'required|integer',
            'dateOfManufacture' => 'required|date',
            'employee_id' => 'required|integer',
        ]), ['type_id' => $costume_type->id, 'availability' => $availability]));

        return view('accessories.show', compact('accessory'), compact('costume_type'));
    }

    /**
     * @param CostumeType $costumeType
     * @param Accessory $accessory
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(CostumeType $costumeType, Accessory $accessory)
    {
        //$this->authorize('delete', $costume);

        $accessory->delete();

        return back();
    }

    public function add(CostumeType $costumeType, Costume $costume)
    {
        return 'ahoj';
    }
}
