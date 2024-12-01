<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'client_id', 'razon', 'productos', 'total', 'pago'];

    public function client() {
        return $this->belongsTo(Client::class, 'client_id');
    }
}