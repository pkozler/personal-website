<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    public function scopeSearch($query, $keyword)
    {
        return $query->where('attr_ref', 'LIKE', '%'.$keyword.'%');
    }

}
