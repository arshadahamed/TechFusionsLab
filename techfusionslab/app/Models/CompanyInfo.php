<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'slug',
        'white_logo',
        'dark_logo',
        'favicon',
        'description',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'phone_one',
        'phone_two',
        'email_one',
        'email_two',
        'address',
        'map_iframe',
        'facebook',
        'twitter',
        'linkedin',
        'youtube',
        'instagram',
        'tiktok',
    ];
}
