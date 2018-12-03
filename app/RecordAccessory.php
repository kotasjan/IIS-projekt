<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed accessory_id
 */
class RecordAccessory extends Model
{
    protected $fillable = [
        'borrowing_id', 'accessory_id'
    ];

    public function accessory() {
        return $this->hasMany(Accessory::class);
    }

    public function borrowing() {
        return $this->hasOne(Borrowing::class);
    }
}
