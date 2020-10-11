<?php

namespace App\Services\Admin\Features\Company;

use App\Data\Models\User;
use App\Domains\User\Jobs\GetFirstUserJob;
use App\Domains\Company\Jobs\{SendCompanyCreatedNotificationJob, StoreCompanyJob, StoreCompanyLogoJob};
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
            $this->run(new StoreCompanyLogoJob(
                $company,
                $request->file('logo')
            ));
        }
        $user = $this->run(new GetFirstUserJob());

        $this->run(new SendCompanyCreatedNotificationJob($user, $company));

        return $this->run(new RespondWithJsonJob([
            'company' => new CompanyResource($company)
        ], Response::HTTP_CREATED
        ));
    }
}
