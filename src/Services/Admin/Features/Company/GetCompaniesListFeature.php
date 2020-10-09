<?php

namespace App\Services\Admin\Features\Company;

use App\Domains\Company\Jobs\GetCompaniesAsPaginatedCollectionJob;
use App\Domains\Http\Jobs\RespondWithJsonJob;
use App\Services\Admin\Http\Resources\Company\CompanyResource;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class GetCompaniesListFeature extends Feature
{
    public function handle(Request $request)
    {
        $limit = $request->get('limit');

        $companies = $this->run(new GetCompaniesAsPaginatedCollectionJob($limit));

        return $this->run(new RespondWithJsonJob([
            'companies' => CompanyResource::collection($companies)->resource
        ]));
    }
}
