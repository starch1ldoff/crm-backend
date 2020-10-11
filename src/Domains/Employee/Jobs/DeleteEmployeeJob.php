<?php

namespace App\Domains\Employee\Jobs;

use App\Data\Models\Employee;
use Lucid\Foundation\Job;

class DeleteEmployeeJob extends Job
{
    /**
     * @var Employee
     */
    private Employee $employee;

    /**
     * Create a new job instance.
     *
     * @param Employee $employee
     */
    public function __construct(Employee $employee)
    {
        $this->employee = $employee;
    }

    /**
     * Execute the job.
     *
     * @return bool
     */
    public function handle(): bool
    {
        return $this->employee->delete();
    }
}
