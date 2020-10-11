<?php

namespace App\Domains\Company\Jobs;

use App\Data\Models\Company;
use Lucid\Foundation\Job;

class DeleteCompanyMediaByCollectionNameJob extends Job
{
    /**
     * @var Company
     */
    private Company $company;

    /**
     * @var string
     */
    private string $collectionName;

    /**
     * Create a new job instance.
     *
     * @param Company $company
     * @param string $collectionName
     */
    public function __construct(Company $company, string $collectionName)
    {
        $this->company = $company;
        $this->collectionName = $collectionName;
    }

    /**
     * Execute the job.
     *
     * @return Company
     */
    public function handle(): Company
    {
        return $this->company->clearMediaCollection($this->collectionName);
    }
}
