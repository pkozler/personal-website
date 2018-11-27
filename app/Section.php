<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_attr', 'nav_title', 'heading', 'paragraph', 'next_label', 'bg_image_path'];

}
