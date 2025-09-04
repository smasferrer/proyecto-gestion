<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;

class Proyecto extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'fecha_inicio',
        'estado',
        'responsable',
        'monto',
        'created_by',
    ];

    // Relación de quién pertenece el proyecto
    public function creador()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    protected $casts = [
        'fecha_inicio' => 'date',
        'monto'        => 'decimal:2',
    ];
}
