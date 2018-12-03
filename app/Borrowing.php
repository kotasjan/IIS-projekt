<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * @property mixed id
 */
class Borrowing extends Model
{
    protected $fillable = [
        'nameOfEvent', 'numberOfCostumes', 'numberOfAccessories', 'dateOfRental', 'dateOfReturn', 'totalPrice', 'isFinished', 'isCurrent', 'isConfirmed', 'client_id', 'employee_id',
    ];

    public function updateCostumes()
    {
        $this->update([
            'numberOfCostumes' => $this->getNumberOfCostumes()
        ]);
    }

    public function updateAccessories()
    {
        $this->update([
            'numberOfAccessories' => $this->getNumberOfAccessories()
        ]);
    }

    public function getNumberOfCostumes()
    {
        return RecordCostume::where(['borrowing_id' => $this->id])->count();
    }

    public function getNumberOfAccessories()
    {
        return RecordAccessory::where(['borrowing_id' => $this->id])->count();
    }

    public function totalPrice()
    {
        $costume_records = RecordCostume::where(['borrowing_id' => $this->id])->get();
        $accessory_records = RecordAccessory::where(['borrowing_id' => $this->id])->get();
        $price = 0;

        foreach ($costume_records as $record){
            if($record->dateOfReturn != null && $record->dateOfRental != null){
                $price += (Costume::where(['id' => $record->costume_id])->first()->price * ($record->dateOfReturn)->diffInDays($record->dateOfRental));
            } else {
                $price += Costume::where(['id' => $record->costume_id])->first()->price;
            }
        }

        foreach ($accessory_records as $record) {
            if($record->dateOfReturn != null && $record->dateOfRental != null){
                $price += (Accessory::where(['id' => $record->accessory_id])->first()->price * ($record->dateOfReturn)->diffInDays($record->dateOfRental));
            } else {
                $price += Accessory::where(['id' => $record->accessory_id])->first()->price;
            }
        }

        return $price;
    }

    public function releaseCostumes()
    {
        $costume_records = RecordCostume::where(['borrowing_id' => $this->id])->get();

        foreach ($costume_records as $record)
            Costume::where(['id' => $record->costume_id])->first()->update([
                'availability' => true,
            ]);
    }

    public function releaseAccessories()
    {
        $accessory_records = RecordAccessory::where(['borrowing_id' => $this->id])->get();

        foreach ($accessory_records as $record)
            Accessory::where(['id' => $record->accessory_id])->first()->update([
                'availability' => true,
            ]);
    }

    public function client()
    {
        return $this->hasOne(Client::class);
    }

    public function employee()
    {
        return $this->hasOne(Employee::class);
    }

    public function recordCostume()
    {
        return $this->hasMany(RecordCostume::class);
    }

    public function recordAccessory()
    {
        return $this->hasMany(RecordAccessory::class);
    }


}
