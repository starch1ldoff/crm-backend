<?php

namespace App\Services\Admin\Http\Requests\Employee;

use App\Data\Rules\CheckIfPhoneNumberIsValidRule;
use App\Services\Admin\Http\Requests\BaseRequest;

class UpdateEmployeeRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => ['required', 'string', 'min:2'],
            'last_name' => ['required', 'string', 'min:2'],
            'email' => ['nullable', 'email'],
            'company_id' => ['required', 'exists:companies,id'],
            'phone' => ['nullable', 'string', new CheckIfPhoneNumberIsValidRule()]
        ];
    }
}
