<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommissionTypeStatement extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public const TYPE_SELECT = [
        'package'   => 'Tuition Package',
        'affiliate' => 'Affiliate',
    ];

    public $table = 'commission_type_statements';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'type',
        'sub_total',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function commissionGroupCommissionStatements()
    {
        return $this->belongsToMany(CommissionStatement::class);
    }

    public function items()
    {
        return $this->belongsToMany(AgentStudent::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
