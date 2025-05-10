<?php

namespace App\Http\Requests;

use App\Models\University;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUniversityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('update', University::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'string'],
            'description' => ['nullable', 'string'],

            // Location information
            'address' => ['sometimes', 'string'],
            'city' => ['sometimes', 'string'],
            'state' => ['nullable', 'string'],
            'country' => ['sometimes', 'string'],
            'postal_code' => ['nullable', 'string'],

            // Contact information
            'phone' => ['nullable', 'string'],
            'email' => ['nullable', 'email'],
            'website' => ['sometimes', 'url'],

            // Additional metadata
            'is_active' => ['sometimes', 'boolean'],
            'is_featured' => ['sometimes', 'boolean'],
        ];
    }
}
