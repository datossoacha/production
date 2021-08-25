<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SedClasificacionSaber extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public const ZONA_SELECT = [
        'Urbana' => 'Urbana',
        'Rural'  => 'Rural',
    ];

    public const SECTOR_SELECT = [
        'Oficial'    => 'Oficial',
        'No oficial' => 'No oficial',
    ];

    public $table = 'sed_clasificacion_sabers';

    protected $dates = [
        'fecha_corte',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'dane',
        'zona',
        'sector',
        'comuna_id',
        'clasificacion',
        'matriculas_3_ult',
        'evaluados_3_ult',
        'indice_matematica',
        'indice_ciencias',
        'indice_sociales',
        'indice_lectura',
        'indice_ingles',
        'indice_total',
        'fecha_corte',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function comuna()
    {
        return $this->belongsTo(Comuna::class, 'comuna_id');
    }

    public function getFechaCorteAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaCorteAttribute($value)
    {
        $this->attributes['fecha_corte'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
