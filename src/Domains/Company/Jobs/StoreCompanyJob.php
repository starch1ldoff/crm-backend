<?php

namespace App\Domains\Company\Jobs;

use App\Data\Models\Company;
use Lucid\Foundation\Job;

class StoreCompanyJob extends Job
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
     * @return Company
     */
    public function handle(): Company
    {
        return Company::create($this->data);
    }
}
