<?php

namespace App\Models;

use App\Models\User;
use App\Models\Proposal;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory, Notifiable;

    protected $table ='city';
    
    protected $fillable = [
        'cities',
        'country',
        'admin_name',
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