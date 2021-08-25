<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sede extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'sedes';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'institucion_id',
        'nombre',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function institucion()
    {
        return $this->belongsTo(Institucione::class, 'institucion_id');
    }

    public function jornadas()
    {
        return $this->belongsToMany(Jornada::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
