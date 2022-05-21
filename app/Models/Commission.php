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

    public $table = 'commissions';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'tuition_package_efk',
        'agent_plan_id',
        'commission',
        'up_x_line',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function agent_plan()
    {
        return $this->belongsTo(AgentPlan::class, 'agent_plan_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
