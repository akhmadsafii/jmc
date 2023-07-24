<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Province extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "provinces";

    protected $guarded = [];

    protected $dates = ['deleted_at'];

    protected $primaryKey = 'id';

    protected $keyType = 'string';

    public $incrementing = false;

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($province) {
            $province->districts()->delete();
        });
    }

    public function districts()
    {
        return $this->hasMany(District::class, 'province_id');
    }
}
