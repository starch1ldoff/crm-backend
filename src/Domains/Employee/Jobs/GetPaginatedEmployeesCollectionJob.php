<?php

namespace App\Domains\Employee\Jobs;

use App\Data\Models\Employee;
use Illuminate\Pagination\LengthAwarePaginator;
use Lucid\Foundation\Job;

class GetPaginatedEmployeesCollectionJob extends Job
{
    /**
     * @var int
     */
    private int $limit;

    /**
     * Create a new job instance.
     *
     * @param int $limit
     */
    public function __construct(int $limit)
    {
        $this->limit = $limit;
    }

    /**
     * Execute the job.
     *
     * @return LengthAwarePaginator
     */
    public function handle(): LengthAwarePaginator
    {
        return Employee::with(['company', 'company.media'])->paginate($this->limit);
    }
}
