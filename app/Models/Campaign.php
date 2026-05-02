<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'target_url'];

    public function clicks()
    {
        return $this->hasMany(Click::class);
    }
}
