<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterTenantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'company' => 'string|required|max:255|unique:tenants,id',
            'domain' => 'string|required|max:255|unique:domains,domain',
            'name' => 'string|required|max:255',
            'email' => 'string|email',
            'password' => ['string', 'confirmed', Password::defaults()]
        ];
    }

    public function prepareForValidation(): void
    {
        $this->merge([
            'domain' => $this->domain . '.' . config('tenancy.central_domains')[0]
        ]);
    }
}
