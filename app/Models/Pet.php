<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'especie', 'raza', 'client_id', 'fecha_nacimiento'];

    public function client() {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function appointments() {
        return $this->hasMany(Appointment::class);
    }
}
