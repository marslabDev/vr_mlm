<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MlmLevel extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'mlm_levels';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'current_plan_id',
        'up_line_id',
        'position',
        'path',
        'level',
        'children_count',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function current_plan()
    {
        return $this->belongsTo(MlmPackage::class, 'current_plan_id');
    }

    public function up_line()
    {
        return $this->belongsTo(Product::class, 'up_line_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
