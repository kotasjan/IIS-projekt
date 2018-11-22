<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LegalEntity extends Model
{
    protected $fillable = [
        'ico', 'dic', 'billingAddress',
    ];


    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
