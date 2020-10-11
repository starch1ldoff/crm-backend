<?php

namespace App\Domains\Employee\Jobs;

use App\Data\Models\Employee;
use Lucid\Foundation\Job;

class UpdateEmployeeJob extends Job
{
    /**
     * @var Employee
     */
    private Employee $employee;
    private array $data;

    /**
     * Create a new job instance.
     *
     * @param Employee $employee
     * @param array $data
     */
    public function __construct(Employee $employee, array $data)
    {
        $this->employee = $employee;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return bool
     */
    public function handle(): bool
    {
        return $this->employee->update($this->data);
    }
}
