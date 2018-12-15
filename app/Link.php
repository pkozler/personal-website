<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['attr_ref', 'text_val', 'attr_icon	', 'attr_id'];

    public function scopeSearch($query, $keyword)
    {
        return $query->where('attr_ref', 'LIKE', '%'.$keyword.'%');
    }

}
