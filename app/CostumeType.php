<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed id
 */
class CostumeType extends Model
{
    protected $fillable = [
        'name', 'manufacturer', 'material', 'description', 'category_id',
    ];
}
