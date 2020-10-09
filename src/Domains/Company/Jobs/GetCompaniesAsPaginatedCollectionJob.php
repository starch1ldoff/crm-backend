<?php

namespace App\Domains\Company\Jobs;

use App\Data\Models\Company;
use Illuminate\Pagination\LengthAwarePaginator;
use Lucid\Foundation\Job;

class GetCompaniesAsPaginatedCollectionJob extends Job
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
    public function __construct(int $limit = 10)
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
        return Company::paginate($this->limit);
    }
}
