<?php

namespace App\Domains\Employee\Jobs;

use App\Data\Models\Employee;
use Lucid\Foundation\Job;

class GetEmployeeByIdJob extends Job
{
    /**
     * @var int
     */
    private int $id;

    /**
     * Create a new job instance.
     *
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return Employee
     */
    public function handle(): Employee
    {
        return Employee::find($this->id);
    }
}
