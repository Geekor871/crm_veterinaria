<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = ['client_id', 'total', 'estado'];

    public function client() {
        return $this->belongsTo(Client::class, 'client_id');
    }
}

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'cantidad',
        'costo',
    ];
}