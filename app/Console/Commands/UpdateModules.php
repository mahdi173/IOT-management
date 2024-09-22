<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Actions\changeModulesValuesAction;
use App\Events\ModulesUpdated;

class UpdateModules extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-modules';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This Command changes randomly the modules values';

    /**
     * Execute the console command.
     */
    public function handle(changeModulesValuesAction $changeModulesValues)
    {
        //function that changes randomly the modules values
        $changeModulesValues();
    }
}
