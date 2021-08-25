<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SedRepitencium extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'sed_repitencia';

    protected $dates = [
        'fecha_corte',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'poblacion',
        'matricula',
        'repitencia',
        'fecha_corte',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

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
