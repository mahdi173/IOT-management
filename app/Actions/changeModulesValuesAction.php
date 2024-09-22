<?php

namespace App\Actions;

use App\Models\Module;
use App\Repositories\ModuleHistoryRepository;
use Carbon\Carbon;

class changeModulesValuesAction
{
    public function __construct(private ModuleHistoryRepository $moduleHistoryRepository) 
    {
    }

    public function __invoke()
    {
        $modules= Module::all();
        $status= array('active', 'inactive', 'failure');
        foreach($modules as $module){
            $module->value= rand(0, 999);
            $module->number_data_sent= rand(0, 9999);
            if($module->status == "active"){
                $module->running_time= $this->calculateTime($module) ;
            }
            $module->status=  $status[rand(0, 2)];
            $module->save();
            //create history after the update
            $this->createChangeHistory($module);
        }
    }
  
    public function calculateTime($module){
        $lastUpdateTime = Carbon::parse($module->updated_at);

        // Calculate the time difference in seconds between now and the last update
        $timeSinceLastUpdateInSeconds = $lastUpdateTime->diffInSeconds(Carbon::now());

        // Convert current running_time to a Carbon object
        $currentRunningTime = Carbon::parse($module->running_time);

        // Add the time difference to the current running time
        $newRunningTime = $currentRunningTime->addSeconds($timeSinceLastUpdateInSeconds);

        // Format the running time back to 'H:i:s'
        $module->running_time = $newRunningTime->format('H:i:s');

        return $module->running_time;
    }

    public function createChangeHistory($module){
        $this->moduleHistoryRepository->create($module);
    }
}