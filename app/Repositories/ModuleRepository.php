<?php

namespace App\Repositories;

use App\Models\Module;

class ModuleRepository
{     
   /**
    * create
    *
    * @param  array $data
    * @return Module
    */
    public function create(array $data): Module{
        return Module::create($data);
    }
}