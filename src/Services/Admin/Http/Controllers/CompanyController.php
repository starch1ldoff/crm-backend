<?php

namespace App\Services\Admin\Http\Controllers;

use App\Data\Models\Company;
use App\Services\Admin\Features\Company\{
    DeleteCompanyFeature,
    GetCompaniesListFeature,
    ShowCompanyFeature,
    StoreCompanyFeature,
    UpdateCompanyFeature
};
use Illuminate\Http\Resources\Json\JsonResource;
use Lucid\Foundation\Http\Controller;
use Lucid\Foundation\ServesFeaturesTrait;

class CompanyController extends Controller
{
    use ServesFeaturesTrait;

    /**
     * Display a listing of the resource.
     *
     * @return JsonResource
     */
    public function index()
    {
        return $this->serve(GetCompaniesListFeature::class);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return JsonResource
     */
    public function store()
    {
        return $this->serve(StoreCompanyFeature::class);
    }

    /**
     * Display the specified resource.
     *
     * @param Company $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return $this->serve(ShowCompanyFeature::class, [
            'company' => $company
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Company $company
     * @return JsonResource
     */
    public function update(Company $company)
    {
        return $this->serve(UpdateCompanyFeature::class, [
            'company' => $company
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Company $company
     * @return JsonResource
     */
    public function destroy(Company $company)
    {
        return $this->serve(DeleteCompanyFeature::class, [
            'company' => $company
        ]);
    }
}
