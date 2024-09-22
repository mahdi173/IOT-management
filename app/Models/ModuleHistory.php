<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleHistory extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'status',
        'value',
        'measure_unit',
        'module_id'
    ]; 

    /**
     * module
     *
     */
    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
