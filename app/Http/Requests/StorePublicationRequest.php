<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePublicationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->isAdmin() ?? false;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'authors' => ['required', 'string', 'max:500'],
            'year' => ['required', 'integer', 'min:1900', 'max:2100'],
            'venue' => ['nullable', 'string', 'max:255'],
            'doi' => ['nullable', 'string', 'max:255', 'unique:publications,doi,' . $this->route('publication')?->id],
            'url' => ['nullable', 'url', 'max:1000'],
            'type' => ['required', 'in:article,tcc,conference,book,other'],
            'abstract' => ['nullable', 'string'],
        ];
    }
}
