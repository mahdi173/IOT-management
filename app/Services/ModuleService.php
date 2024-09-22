<?php

namespace App\Services;

use App\Models\Module;
use App\Repositories\ModuleHistoryRepository;
use App\Repositories\ModuleRepository;
use Illuminate\Http\Request;

class ModuleService
{            
    /**
     * __construct
     *
     * @param  ModuleRepository $moduleRepository
     * @return void
     */
    public function __construct( private ModuleRepository $moduleRepository, private ModuleHistoryRepository $moduleHistoryRepository)
    {
    }

    /**
     * storeModule
     *
     * @param  array $data
     * @return mixed
     */
    public function storeModule(array $data): mixed
    {  
       $module= $this->moduleRepository->create($data);
       //save history
       $this->moduleHistoryRepository->create($module);
       return $module;
    }

    /**
     * showModules
     *
     * @param  Request $request
     * @return mixed
     */
    public function showModules(): mixed
    {           
        $modules= Module::orderBy('created_at', 'desc')->paginate(5);
        return view('Module/index', compact('modules'));
    }
}