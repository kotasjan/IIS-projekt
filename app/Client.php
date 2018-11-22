<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/**
 * @property mixed id
 */
class Client extends Model
{
    protected $fillable = [
        'isLegalEntity', 'id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
