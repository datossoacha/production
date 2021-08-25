<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SedEstimulosGestore extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public const ESTADO_SELECT = [
        'Finalizado'   => 'Finalizado',
        'En ejecución' => 'En ejecución',
    ];

    public $table = 'sed_estimulos_gestores';

    protected $dates = [
        'fecha_presentacion',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nombre',
        'linea_participacion',
        'proyecto',
        'estado',
        'fecha_presentacion',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getFechaPresentacionAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaPresentacionAttribute($value)
    {
        $this->attributes['fecha_presentacion'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
