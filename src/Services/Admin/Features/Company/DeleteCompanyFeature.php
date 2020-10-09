<?php

namespace App\Services\Admin\Features\Company;

use App\Data\Models\Company;
use App\Domains\Company\Jobs\DeleteCompanyJob;
use App\Domains\Http\Jobs\RespondWithJsonJob;
use Illuminate\Http\Response;
use Lucid\Foundation\Feature;

class DeleteCompanyFeature extends Feature
{
    /**
     * @var Company
     */
    private $company;

    /**
     * DeleteCompanyFeature constructor.
     * @param Company $company
     */
    public function __construct(Company $company)
    {
        $this->company = $company;
    }

    public function handle()
    {
        $this->run(new DeleteCompanyJob($this->company));

        return $this->run(new RespondWithJsonJob([], Response::HTTP_NO_CONTENT));
    }
}
