<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EachLevelCommission extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'each_level_commissions';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'commission',
        'level',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function commissionCommissions()
    {
        return $this->belongsToMany(Commission::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
