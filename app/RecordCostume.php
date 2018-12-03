<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed costume_id
 */
class RecordCostume extends Model
{
    protected $fillable = [
        'borrowing_id', 'costume_id'
    ];

    public function costume() {
        return $this->hasOne(Costume::class);
    }

    public function borrowing() {
        return $this->hasOne(Borrowing::class);
    }
}
