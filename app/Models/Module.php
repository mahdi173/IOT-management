<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'running_time',
        'number_data_sent',
        'status',
        'value',
        'measure_unit'
    ];

    /**
     * histories
     *
     */
    public function histories(){
        return $this->hasMany(ModuleHistory::class);
    }
}
