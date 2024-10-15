<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetModel extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'especie', 'raza', 'client_id'];

    public function client() {
        return $this->belongsTo(Client::class);
    }

    public function appointments() {
        return $this->hasMany(Appointment::class);
    }
}
