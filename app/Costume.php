<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed type_id
 */
class Costume extends Model
{
    protected $fillable = [
        'price', 'dateOfManufacture', 'worn', 'size', 'color', 'availability', 'employee_id', 'type_id'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function recordCostume()
    {
        return $this->hasMany(RecordCostume::class);
    }

    public function accessory()
    {
        return $this->hasMany(Accessory::class);
    }

    public function category()
    {
        return $this->hasOne(Category::class);
    }
}
