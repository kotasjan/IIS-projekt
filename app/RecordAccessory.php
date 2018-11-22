<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecordAccessory extends Model
{

    public function accessory() {
        return $this->hasMany(Accessory::class);
    }

    public function borrowing() {
        return $this->hasOne(Borrowing::class);
    }
}
