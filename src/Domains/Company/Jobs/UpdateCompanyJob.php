<?php

namespace App\Domains\Company\Jobs;

use App\Data\Models\Company;
use Illuminate\Foundation\Http\FormRequest;
use Lucid\Foundation\Job;

class UpdateCompanyJob extends Job
{
    /**
     * @var Company
     */
    private Company $company;

    /**
     * @var array
     */
    private array $data;

    /**
     * Create a new job instance.
     *
     * @param Company $company
     * @param array $data
     */
    public function __construct(Company $company, array $data)
    {
        $this->company = $company;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return bool
     */
    public function handle(): bool
    {
        return $this->company->update($this->data);
    }
}
