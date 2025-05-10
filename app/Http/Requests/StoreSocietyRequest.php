<?php

namespace App\Http\Requests;

use App\Models\Society;
use Illuminate\Foundation\Http\FormRequest;

class StoreSocietyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('create', [Society::class, $this->university]);
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
            'email' => ['required', 'email'],

            'facebook_url' => ['nullable', 'url'],
            'instagram_handle' => ['nullable', 'string'],
            'twitter_handle' => ['nullable', 'string'],
            'discord_url' => ['nullable', 'url'],

            'meeting_schedule' => ['nullable', 'string'],
            'meeting_location' => ['nullable', 'string'],

            'founding_date' => ['nullable', 'date'],

            'is_active' => ['sometimes', 'boolean'],
            'is_official' => ['sometimes', 'boolean'],

            'category' => ['nullable', 'string'],
            'tags' => ['nullable', 'array'],
            'tags.*' => ['string'],
        ];
    }
}
