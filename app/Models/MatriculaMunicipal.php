<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MatriculaMunicipal extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public const SECTOR_SELECT = [
        'OFICIAL' => 'OFICIAL',
        'PRIVADO' => 'PRIVADO',
    ];

    public $table = 'matricula_municipals';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'sector',
        'institucion',
        'sede',
        'jornada',
        'comuna_id',
        'grado_0',
        'grado_1',
        'grado_2',
        'grado_3',
        'grado_4',
        'grado_5',
        'grado_6',
        'grado_7',
        'grado_8',
        'grado_9',
        'grado_10',
        'grado_11',
        'grado_22',
        'grado_23',
        'grado_24',
        'grado_25',
        'grado_99',
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
