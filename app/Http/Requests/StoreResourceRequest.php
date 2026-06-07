<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreResourceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->isAdmin() ?? false;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'url' => ['nullable', 'url', 'max:1000'],
            'file' => ['nullable', 'file', 'max:10240'],
            'type' => ['required', 'in:tool,material,dataset,template,other'],
            'is_public' => ['boolean'],
        ];
    }
}
