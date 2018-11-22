<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecordCostume extends Model
{


    public function costume() {
        return $this->hasOne(Costume::class);
    }

    public function borrowing() {
        return $this->hasOne(Borrowing::class);
    }
}
