<?php

namespace App\Http\Requests;

use App\Models\University;
use Illuminate\Foundation\Http\FormRequest;

class StoreUniversityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('create', University::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'description' => ['nullable', 'string'],

            // Location information
            'address' => ['required', 'string'],
            'city' => ['required', 'string'],
            'state' => ['nullable', 'string'],
            'country' => ['required', 'string'],
            'postal_code' => ['nullable', 'string'],

            // Contact information
            'phone' => ['nullable', 'string'],
            'email' => ['nullable', 'email'],
            'website' => ['required', 'url'],

            // Additional metadata
            'is_active' => ['boolean'],
            'is_featured' => ['boolean'],
        ];
    }
}
