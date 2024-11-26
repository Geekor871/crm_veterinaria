<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = ['fecha_hora', 'motivo', 'observaciones', 'pet_id'];

    public function pet() {
        return $this->belongsTo(Pet::class);
    }
}
