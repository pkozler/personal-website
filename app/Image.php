<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Image
 * @package App
 *
 * @property int $id
 * @property string $path
 * @property string $label_category
 * @property string $label_name
 */
class Image extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'path', 'label_category', 'label_name'
    ];

}
