<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;

    protected $guarded = ['created_at','updated_at'];
    const ACEPTADO=1;
    const PENDIENTE=2;
    const RECHAZADO=3;

    public function sale()
    {
        return $this->hasOne(Sale::class);
    }
}
