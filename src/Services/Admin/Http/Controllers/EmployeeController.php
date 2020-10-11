<?php

namespace App\Services\Admin\Http\Controllers;

use App\Data\Models\Employee;
use App\Services\Admin\Features\Employee\{
    DeleteEmployeeFeature,
    GetEmployeesListFeature,
    ShowEmployeeFeature,
    StoreEmployeeFeature,
    UpdateEmployeeFeature
};
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Lucid\Foundation\Http\Controller;
use Lucid\Foundation\ServesFeaturesTrait;

class EmployeeController extends Controller
{
    use ServesFeaturesTrait;

    /**
     * Display a listing of the resource.
     *
     * @return JsonResource
     */
    public function index()
    {
        return $this->serve(GetEmployeesListFeature::class);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return JsonResponse
     */
    public function store()
    {
        return $this->serve(StoreEmployeeFeature::class);
    }

    /**
     * Display the specified resource.
     *
     * @param Employee $employee
     * @return JsonResponse
     */
    public function show(Employee $employee)
    {
        return $this->serve(ShowEmployeeFeature::class, $employee);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Employee $employee
     * @return JsonResponse
     */
    public function update(Employee $employee)
    {
        return $this->serve(UpdateEmployeeFeature::class, $employee);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Employee $employee
     * @return JsonResponse
     */
    public function destroy(Employee $employee)
    {
        return $this->serve(DeleteEmployeeFeature::class, $employee);
    }
}
