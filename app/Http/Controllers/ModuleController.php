<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreModuleRequest;
use App\Models\Module;
use App\Services\ModuleService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\JsonResponse;

class ModuleController extends Controller
{    
    /**
     * __construct
     *
     * @param  mixed $moduleService
     * @return void
     */
    public function __construct(private ModuleService  $moduleService)
    {
    }
    
    /**
     * index
     *
     * @return mixed
     */
    public function index(): mixed
    {
        return $this->moduleService->showModules();
    }
    
    /**
     * store
     *
     * @param  StoreModuleRequest $request
     * @return RedirectResponse
     */
    public function store(StoreModuleRequest $request): RedirectResponse
    {
        $data= $request->validated();
        $this->moduleService->storeModule($data);
        return Redirect::route('modules.index')->with('success', 'Module created successfully');
    }

    /**
     * retrieve modules for api endpoint
     * @return JsonResponse
     */
    public function getModules(): JsonResponse {
        $modules = Module::orderBy('created_at', 'desc')->paginate(5);
        return response()->json(['modules' => $modules]);
    }
}