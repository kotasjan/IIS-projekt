<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accessory extends Model
{
    protected $fillable = [
        'name', 'description', 'dateOfManufacture', 'price', 'availability', 'employee_id', 'type_id',
    ];


    public function employee()
    {
        return $this->hasOne(Employee::class);
    }

    public function recordAccessory()
    {
        return $this->hasMany(RecordAccessory::class);
    }

    public function costumeType()
    {
        return $this->belongsTo(CostumeType::class);
    }
}
