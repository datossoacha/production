<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SedPlantaPersonal extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'sed_planta_personals';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'establecimiento_datos',
        'dane',
        'comuna_id',
        'area_formacion',
        'nivel_educativo',
        'area_dicta',
        'vigencia',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function comuna()
    {
        return $this->belongsTo(Comuna::class, 'comuna_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
