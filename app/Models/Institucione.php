<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Institucione extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public const SECTOR_SELECT = [
        'Oficial' => 'Oficial',
        'Privado' => 'Privado',
    ];

    public $table = 'instituciones';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'sector',
        'nombre_institucion',
        'comuna_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function institucionSedes()
    {
        return $this->hasMany(Sede::class, 'institucion_id', 'id');
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
