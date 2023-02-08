<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ambient extends Model
{
    use HasFactory;

    protected $guarded = ['created_at','updated_at'];

    public function users()
    {
        return $this->hasMany(User::class);  
    }
}
