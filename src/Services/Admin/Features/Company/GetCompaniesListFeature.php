<?php

namespace App\Services\Admin\Features\Company;

use App\Domains\Company\Jobs\GetCompaniesAsPaginatedCollectionJob;
use App\Domains\Http\Jobs\RespondWithJsonJob;
use App\Services\Admin\Http\Requests\Company\GetCompaniesListRequest;
use App\Services\Admin\Http\Resources\Company\CompanyResource;
use Lucid\Foundation\Feature;

class GetCompaniesListFeature extends Feature
{
    public function handle(GetCompaniesListRequest $request)
    {
        $limit = $request->get('limit') ?? 10;

        $companies = $this->run(new GetCompaniesAsPaginatedCollectionJob($limit));

        return $this->run(new RespondWithJsonJob([
            'companies' => CompanyResource::collection($companies)->resource
        ]));
    }
}
