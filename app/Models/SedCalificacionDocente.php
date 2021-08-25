<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SedCalificacionDocente extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public const ZONA_SELECT = [
        'Urbana' => 'Urbana',
        'Rural'  => 'Rural',
    ];

    public $table = 'sed_calificacion_docentes';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'dane',
        'institucion_id',
        'sede_id',
        'zona',
        'comuna_id',
        'cargo',
        'area',
        'calificacion',
        'valoracion',
        'vigencia',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function institucion()
    {
        return $this->belongsTo(Institucione::class, 'institucion_id');
    }

    public function sede()
    {
        return $this->belongsTo(Sede::class, 'sede_id');
    }

    public function comuna()
    {
        return $this->belongsTo(Comuna::class, 'comuna_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
