<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    protected $fillable = [
        'nameOfEvent', 'numberOfCostumes', 'numberOfAccessories', 'dateOfRental', 'dateOfReturn', 'totalPrice', 'isFinished', 'client_id', 'employee_id',
    ];

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
