<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type_document extends Model
{
    use HasFactory;
    protected $guarded = ['created_at','updated_at'];
    public function patients(){
        return $this->hasMany(Patient::class);
    }
}
