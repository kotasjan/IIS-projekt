<?php

namespace App\Http\Controllers;

use App\Accessory;
use App\Borrowing;
use App\RecordAccessory;
use Illuminate\Http\Request;

class RecordsAccessoryController extends Controller
{

    public function store(Request $request, Borrowing $borrowing)
    {
        $accessory = Accessory::find($request->get('accessory_id'));

        if(!$accessory->availability) {
            return back();
        } else {
            $accessory->update([
                'availability' => false
            ]);
        }

        RecordAccessory::create([
            'borrowing_id' => $borrowing->id,
            'accessory_id' => $accessory->id,
        ]);

        $borrowing->updateAccessories();

        return redirect('/borrowings');
    }

    public function destroy(Borrowing $borrowing, RecordAccessory $recordAccessory)
    {

        Accessory::find($recordAccessory->accessory_id)->update([
            'availability' => true
        ]);

        $recordAccessory->delete();

        $borrowing->updateAccessories();

        return redirect('/borrowings');
    }

}
