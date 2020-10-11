<?php

namespace App\Services\Admin\Features\Employee;

use App\Domains\Employee\Jobs\GetPaginatedEmployeesCollectionJob;
use App\Domains\Http\Jobs\RespondWithJsonJob;
use App\Services\Admin\Http\Requests\Employee\GetEmployeesListRequest;
use App\Services\Admin\Http\Resources\Employee\EmployeeResource;
use Lucid\Foundation\Feature;

class GetEmployeesListFeature extends Feature
{
    public function handle(GetEmployeesListRequest $request)
    {
        $limit = $request->get('limit') ?? 10;

        $employees = $this->run(new GetPaginatedEmployeesCollectionJob($limit));

        return $this->run(new RespondWithJsonJob([
            'employees' => EmployeeResource::collection($employees)->resource
        ]));
    }
}
