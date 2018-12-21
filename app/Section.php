<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Section
 * @package App
 *
 * @property int $id
 * @property string $id_attr
 * @property string $nav_title
 * @property string $heading
 * @property string $paragraph
 * @property string $next_label
 */
class Section extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_attr', 'nav_title', 'heading', 'paragraph', 'next_label'
    ];

}
