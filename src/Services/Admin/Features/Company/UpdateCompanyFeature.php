<?php

namespace App\Services\Admin\Features\Company;

use App\Data\Models\Company;
use App\Domains\Company\Jobs\{
    GetCompanyByIdJob,
    UpdateCompanyJob,
    UpdateCompanyLogoJob
};
use App\Domains\Http\Jobs\RespondWithJsonJob;
use App\Services\Admin\Http\Requests\Company\UpdateCompanyRequest;
use App\Services\Admin\Http\Resources\Company\CompanyResource;
use Lucid\Foundation\Feature;

class UpdateCompanyFeature extends Feature
{
    /**
     * @var Company
     */
    private Company $company;

    /**
     * UpdateCompanyFeature constructor.
     * @param Company $company
     */
    public function __construct(Company $company)
    {
        $this->company = $company;
    }

    public function handle(UpdateCompanyRequest $request)
    {
        $data = $request->validated();

        $this->run(new UpdateCompanyJob($this->company, $data));

        if ($request->hasFile('image')) {
            $this->run(new UpdateCompanyLogoJob($this->company, $request->file('images')));
        }

        $company = $this->run(new GetCompanyByIdJob($this->company->id));

        return $this->run(new RespondWithJsonJob([
            'company' => new CompanyResource($company)
        ]));
    }
}
