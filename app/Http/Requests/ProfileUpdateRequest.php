<?php

namespace App\Http\Requests;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($this->user()->id),
            ],
            'profile_name'=>['string','max:100'],
            // 'avatar'=>['nullable','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
            // 'cover'=>['nullable','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
            'job_title'=>['required','max:225'],
            'summary'=>['nullable','max:225'],
            'about_myself'=>['nullable'],
        ];
    }
}
