<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed id
 */
class Employee extends Model
{

    protected $fillable = [
        'bankAccountNumber', 'id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
