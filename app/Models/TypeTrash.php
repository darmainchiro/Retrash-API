<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeTrash extends Model
{
    protected $table = 'type_trash';
    protected $guarded = [];

    public function getRouteKeyName(){
        return 'id';
    }

}
