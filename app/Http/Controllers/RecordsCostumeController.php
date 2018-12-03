<?php

namespace App\Http\Controllers;

use App\Borrowing;
use App\Costume;
use App\RecordCostume;
use Illuminate\Http\Request;

class RecordsCostumeController extends Controller
{

    public function store(Request $request, Borrowing $borrowing)
    {
        $costume = Costume::find($request->get('costume_id'));

        if(!$costume->availability) {
            return back();
        } else {
            $costume->update([
                'availability' => false
            ]);
        }

        RecordCostume::create([
            'borrowing_id' => $borrowing->id,
            'costume_id' => $costume->id,
        ]);

        $borrowing->updateCostumes();

        return redirect('/borrowings');
    }

    public function destroy(Borrowing $borrowing, RecordCostume $recordCostume)
    {

        Costume::find($recordCostume->costume_id)->update([
            'availability' => true
        ]);

        $recordCostume->delete();

        $borrowing->updateCostumes();

        return redirect('/borrowings');
    }

}
