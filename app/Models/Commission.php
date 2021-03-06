<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Commission extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public const TYPE_SELECT = [
        'package'   => 'Tuition Package',
        'affiliate' => 'Affiliate',
    ];

    public $table = 'commissions';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'commission',
        'level',
        'type',
        'agent_plan_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function commissionPackagesCommissions()
    {
        return $this->hasMany(PackagesCommission::class, 'commission_id', 'id');
    }

    public function agent_plan()
    {
        return $this->belongsTo(AgentPlan::class, 'agent_plan_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
