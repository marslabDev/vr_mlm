<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PackagesCommission extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'packages_commissions';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'tuition_package_efk',
        'commission_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function commission()
    {
        return $this->belongsTo(Commission::class, 'commission_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
