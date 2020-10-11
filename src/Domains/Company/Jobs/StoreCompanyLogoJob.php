<?php

namespace App\Domains\Company\Jobs;

use App\Data\Enums\MediaCollection;
use App\Data\Models\Company;
use Illuminate\Http\UploadedFile;
use Lucid\Foundation\Job;

class StoreCompanyLogoJob extends Job
{
    /**
     * @var Company
     */
    private Company $company;
    /**
     * @var UploadedFile
     */
    private UploadedFile $logo;

    /**
     * Create a new job instance.
     *
     * @param Company $company
     * @param UploadedFile $logo
     */
    public function __construct(Company $company, UploadedFile $logo)
    {
        $this->company = $company;
        $this->logo = $logo;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        $this->company
            ->addMedia($this->logo)
            ->toMediaCollection(MediaCollection::LOGO);
    }
}
