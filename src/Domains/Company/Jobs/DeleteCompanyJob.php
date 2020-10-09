<?php

namespace App\Domains\Company\Jobs;

use App\Data\Models\Company;
use Lucid\Foundation\Job;

class DeleteCompanyJob extends Job
{
    /**
     * @var Company
     */
    private Company $company;

    /**
     * Create a new job instance.
     *
     * @param Company $company
     */
    public function __construct(Company $company)
    {
        $this->company = $company;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        $this->company->delete();
    }
}
