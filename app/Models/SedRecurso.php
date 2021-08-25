<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SedRecurso extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public const AREA_SELECT = [
        'PLANEACIÓN EDUCATIVA'        => 'PLANEACIÓN EDUCATIVA',
        'ADMINISTRATIVA Y FINANCIERA' => 'ADMINISTRATIVA Y FINANCIERA',
        'COBERTURA EDUCATIVA'         => 'COBERTURA EDUCATIVA',
        'CALIDAD EDUCATIVA'           => 'CALIDAD EDUCATIVA',
        'CULTURA'                     => 'CULTURA',
    ];

    public $table = 'sed_recursos';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'area',
        'asignados',
        'ejecutados',
        'ejecucion',
        'vigencia',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
