<?php

namespace App\Services\Admin\Features\Employee;

use App\Data\Models\Employee;
use App\Domains\Employee\Jobs\GetEmployeeByIdJob;
use App\Domains\Employee\Jobs\UpdateEmployeeJob;
use App\Domains\Http\Jobs\RespondWithJsonJob;
use App\Services\Admin\Http\Requests\Employee\UpdateEmployeeRequest;
use App\Services\Admin\Http\Resources\Employee\EmployeeResource;
use Lucid\Foundation\Feature;

class UpdateEmployeeFeature extends Feature
{
    /**
     * @var Employee
     */
    private Employee $employee;

    /**
     * UpdateEmployeeFeature constructor.
     * @param Employee $employee
     */
    public function __construct(Employee $employee)
    {
        $this->employee = $employee;
    }

    public function handle(UpdateEmployeeRequest $request)
    {
        $data = $request->validated();

        $this->run(new UpdateEmployeeJob($this->employee, $data));

        $employee = $this->run(new GetEmployeeByIdJob($this->employee->id));

        return $this->run(new RespondWithJsonJob([
            'employee' => new EmployeeResource($employee)
        ]));
    }
}
