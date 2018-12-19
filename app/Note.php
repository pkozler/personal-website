<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Note
 * @package App
 *
 * @property int $id
 * @property string $description
 * @property string $title
 * @property string $figure
 */
class Note extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description', 'title', 'figure'
    ];

}
