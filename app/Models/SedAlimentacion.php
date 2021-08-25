<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SedAlimentacion extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public const ZONA_SELECT = [
        'Urbana' => 'Urbana',
        'Rural'  => 'Rural',
    ];

    public $table = 'sed_alimentacions';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'zona',
        'comuna_id',
        'institucion_id',
        'sede_id',
        'grado',
        'beneficiarios',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function comuna()
    {
        return $this->belongsTo(Comuna::class, 'comuna_id');
    }

    public function institucion()
    {
        return $this->belongsTo(Institucione::class, 'institucion_id');
    }

    public function sede()
    {
        return $this->belongsTo(Sede::class, 'sede_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
