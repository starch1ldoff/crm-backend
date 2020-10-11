<?php

namespace App\Services\Admin\Features\Employee;

use App\Data\Models\Employee;
use App\Domains\Http\Jobs\RespondWithJsonJob;
use App\Services\Admin\Http\Resources\Employee\EmployeeResource;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class ShowEmployeeFeature extends Feature
{
    /**
     * @var Employee
     */
    private Employee $employee;

    /**
     * ShowEmployeeFeature constructor.
     * @param Employee $employee
     */
    public function __construct(Employee $employee)
    {
        $this->employee = $employee;
    }

    public function handle()
    {
        return $this->run(new RespondWithJsonJob([
            'employee' => new EmployeeResource($this->employee)
        ]));
    }
}
