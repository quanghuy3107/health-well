<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Click extends Model
{
    use HasFactory;

    protected $fillable = [
        'campaign_id', 
        'click_id', 
        'ip_address', 
        'gclid', 
        'user_agent'
    ];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
