<?php

namespace App\Models;

use App\Models\User;
use App\Models\Proposal;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'title',
        'description',
        'price',
        'image',
        'user_id',
        'city_id',
    ];

    public function scopeOnline($query)
    {
        return $query->where('status', 1);
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}