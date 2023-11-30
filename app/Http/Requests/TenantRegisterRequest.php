<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TenantRegisterRequest extends FormRequest
{
    /**
     * This request has user information too.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'tenant_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'unique:tenants', 'string', 'max:255'],
            'email' => ['required', 'unique:tenants', 'string', 'email', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:6'],
        ];
    }
}
