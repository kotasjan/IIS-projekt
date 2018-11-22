<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Costume extends Model
{
    protected $fillable = [
        'manufacturer', 'material', 'description', 'price', 'dateOfManufacture', 'worn', 'size', 'color', 'availability',
    ];

    public function employee() {
        return $this->belongsTo(Employee::class);
    }

    public function recordCostume() {
        return $this->hasMany(RecordCostume::class);
    }

    public function accessory() {
        return $this->hasMany(Accessory::class);
    }

    public function category() {
        return $this->hasOne(Category::class);
    }
}
