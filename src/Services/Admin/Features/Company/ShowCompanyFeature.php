<?php

namespace App\Services\Admin\Features\Company;

use App\Data\Models\Company;
use App\Domains\Http\Jobs\RespondWithJsonJob;
use App\Services\Admin\Http\Resources\Company\CompanyResource;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class ShowCompanyFeature extends Feature
{
    /**
     * @var Company
     */
    private Company $company;

    /**
     * ShowCompanyFeature constructor.
     * @param Company $company
     */
    public function __construct(Company $company)
    {
        $this->company = $company;
    }

    public function handle()
    {
        return $this->run(new RespondWithJsonJob([
            'company' => new CompanyResource($this->company)
        ]));
    }
}
