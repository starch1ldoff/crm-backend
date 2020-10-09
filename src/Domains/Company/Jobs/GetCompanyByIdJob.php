<?php

namespace App\Domains\Company\Jobs;

use App\Data\Models\Company;
use Lucid\Foundation\Job;

class GetCompanyByIdJob extends Job
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
     * @return Company
     */
    public function handle(): Company
    {
        return Company::find($this->id);
    }
}
