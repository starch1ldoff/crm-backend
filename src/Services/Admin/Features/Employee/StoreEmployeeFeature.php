<?php

namespace App\Services\Admin\Features\Employee;

use App\Domains\Employee\Jobs\StoreEmployeeJob;
use App\Domains\Http\Jobs\RespondWithJsonJob;
use App\Services\Admin\Http\Requests\Employee\StoreEmployeeRequest;
use App\Services\Admin\Http\Resources\Employee\EmployeeResource;
use Illuminate\Http\Response;
use Lucid\Foundation\Feature;

class StoreEmployeeFeature extends Feature
{
    public function handle(StoreEmployeeRequest $request)
    {
        $data = $request->validated();

        $employee = $this->run(new StoreEmployeeJob($data));

        return $this->run(new RespondWithJsonJob([
            'employee' => new EmployeeResource($employee->load(['company', 'company.media']))
        ], Response::HTTP_CREATED));
    }
}
