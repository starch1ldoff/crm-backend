<?php

namespace App\Services\Admin\Http\Requests\Company;

use App\Services\Admin\Http\Requests\BaseRequest;

class UpdateCompanyRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:2'],
            'email' => ['nullable', 'email'],
            'logo' => ['nullable', 'image'],
            'website' => ['nullable', 'string', 'min:2']
        ];
    }
}
