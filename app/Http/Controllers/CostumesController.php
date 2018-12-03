<?php

namespace App\Http\Controllers;

use App\Borrowing;
use App\Costume;
use App\CostumeType;
use App\Employee;
use App\RecordCostume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        return view('costumes.costumes', compact('costumes'), compact('costume_type'));
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
        if($request->has('availability'))
            $availability = true;
        else
            $availability = false;

        $costume = Costume::create(array_merge($request->validate([
            'price' => 'required|integer',
            'dateOfManufacture' => 'required|date',
            'worn' => 'required|integer',
            'size' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'employee_id' => 'required|integer',
        ]), ['type_id' => $costume_type->id, 'availability' => $availability]));

        return redirect('/costume_types/' . $costume_type->id);
    }

    /**
     * @param CostumeType $costume_type
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

    public function update(Request $request, CostumeType $costume_type, Costume $costume)
    {
        if($request->has('availability'))
            $availability = true;
        else
            $availability = false;

        $costume->update(array_merge($request->validate([
            'price' => 'required|integer',
            'dateOfManufacture' => 'required|date',
            'worn' => 'required|integer',
            'size' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'employee_id' => 'required|integer',
        ]), ['type_id' => $costume_type->id, 'availability' => $availability]));

        return view('costumes.show', compact('costume'), compact('costume_type'));
    }

    /**
     * @param Costume $costume
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(CostumeType $costumeType, Costume $costume)
    {
        //$this->authorize('delete', $costume);

        $costume->delete();

        return back();
    }
}
