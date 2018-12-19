<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Link
 * @package App
 *
 * @property int $id
 * @property string $attr_ref
 * @property string $text_val
 * @property string $attr_icon
 * @property string $attr_id
 */
class Link extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'attr_ref', 'text_val', 'attr_icon	', 'attr_id'
    ];

    /**
     * @param $query
     * @param $keyword
     * @return mixed
     */
    public function scopeSearch($query, $keyword)
    {
        return $query->where('attr_ref', 'LIKE', '%'.$keyword.'%');
    }

}
