<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attention extends Model
{
    use HasFactory;
    protected $guarded = ['created_at','updated_at'];
    const ESPERA=1;
    const INICIADO=2;
    const TERMINADO=3;


    public function service()
    {
        return $this->belongsTo(Service::class);
    }

  

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

}
