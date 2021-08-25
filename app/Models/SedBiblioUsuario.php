<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SedBiblioUsuario extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'sed_biblio_usuarios';

    protected $dates = [
        'fecha_visita',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'sede_biblioteca',
        'motivo_visita',
        'grupo_etario',
        'genero',
        'tipo_poblacion',
        'fecha_visita',
        'cantidad_asistentes',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getFechaVisitaAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaVisitaAttribute($value)
    {
        $this->attributes['fecha_visita'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
