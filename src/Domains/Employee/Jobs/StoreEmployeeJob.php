<?php

namespace App\Domains\Employee\Jobs;

use App\Data\Models\Employee;
use Lucid\Foundation\Job;

class StoreEmployeeJob extends Job
{
    /**
     * @var array
     */
    private array $data;

    /**
     * Create a new job instance.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return Employee
     */
    public function handle(): Employee
    {
        return Employee::create($this->data);
    }
}
