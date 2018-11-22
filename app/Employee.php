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

    public function borrowing() {
        return $this->hasMany(Borrowing::class);
    }

    public function costume() {
        return $this->hasMany(Costume::class);
    }

    public function accessory() {
        return $this->hasMany(Accessory::class);
    }
}
