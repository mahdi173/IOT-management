<?php

namespace App\Repositories;

use App\Models\ModuleHistory;
use App\Models\Module;

class ModuleHistoryRepository
{     
   /**
    * create
    *
    * @param  Module $data
    * @return ModuleHistory
    */
    public function create(Module $module): ModuleHistory{
        $moduleStatus = !empty($module->status) ? $module->status : 'active';

        $data= array(
            'status' => $moduleStatus,
            'value' => $module->value,
            'measure_unit' => $module->measure_unit,
            'module_id' => $module->id,
        );
        
        return ModuleHistory::create($data);
    }
}