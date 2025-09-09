<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{

   protected $fillable = [
        'title',
        'highlight',
        'description',
        'button_text',
        'button_link',
        'main_image',
        'bg_image',
        'map_image',
    ];
}
