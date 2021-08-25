<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SedParticipacionArtistum extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'sed_participacion_artista';

    protected $dates = [
        'fecha_inicial',
        'fecha_final',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nombre_artista',
        'nombre_festival',
        'fecha_inicial',
        'fecha_final',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getFechaInicialAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaInicialAttribute($value)
    {
        $this->attributes['fecha_inicial'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getFechaFinalAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaFinalAttribute($value)
    {
        $this->attributes['fecha_final'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
