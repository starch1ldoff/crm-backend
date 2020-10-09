<?php

namespace App\Services\Admin\Features\Company;

use App\Domains\Company\Jobs\{
    StoreCompanyJob,
    StoreCompanyLogoJob
};
use App\Domains\Http\Jobs\RespondWithJsonJob;
use App\Services\Admin\Http\Requests\Company\StoreCompanyRequest;
use App\Services\Admin\Http\Resources\Company\CompanyResource;
use Illuminate\Http\Response;
use Lucid\Foundation\Feature;

class StoreCompanyFeature extends Feature
{
    public function handle(StoreCompanyRequest $request)
    {
        $data = $request->validated();

        $company = $this->run(new StoreCompanyJob($data));

        if ($request->hasFile('logo')) {
            $this->run($this->run(new StoreCompanyLogoJob(
                $company,
                $request->file('logo')
            )));
        }

        return $this->run(new RespondWithJsonJob([
            'company' => new CompanyResource($company)
        ], Response::HTTP_CREATED
        ));
    }
}
