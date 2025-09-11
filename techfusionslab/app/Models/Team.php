<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
   use HasFactory;

    /**
     * The table associated with the model.
     *
     * (optional, Laravel automatically assumes plural form "teams")
     */
    protected $table = 'teams';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'position',
        'email',
        'phone',
        'image',
        'bio',
        'facebook',
        'twitter',
        'linkedin',
        'youtube',
        'instagram',
        'status',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Scope for only active team members.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}
