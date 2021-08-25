<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jornada extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'jornadas';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nombre',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function jornadasSedes()
    {
        return $this->belongsToMany(Sede::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
