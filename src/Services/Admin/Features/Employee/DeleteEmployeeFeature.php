<?php

namespace App\Services\Admin\Features\Employee;

use App\Data\Models\Employee;
use App\Domains\Employee\Jobs\DeleteEmployeeJob;
use App\Domains\Http\Jobs\RespondWithJsonJob;
use Illuminate\Http\Response;
use Lucid\Foundation\Feature;

class DeleteEmployeeFeature extends Feature
{
    /**
     * @var Employee
     */
    private Employee $employee;

    /**
     * DeleteEmployeeFeature constructor.
     * @param Employee $employee
     */
    public function __construct(Employee $employee)
    {
        $this->employee = $employee;
    }

    public function handle()
    {
        $this->run(new DeleteEmployeeJob($this->employee));

        return $this->run(new RespondWithJsonJob([], Response::HTTP_NO_CONTENT));
    }
}
