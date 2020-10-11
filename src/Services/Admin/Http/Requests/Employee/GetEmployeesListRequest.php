<?php

namespace App\Services\Admin\Http\Requests\Employee;

use App\Services\Admin\Http\Requests\BaseRequest;

class GetEmployeesListRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'limit' => ['nullable', 'integer', 'min:1'],
            'page' => ['nullable', 'integer']
        ];
    }
}
