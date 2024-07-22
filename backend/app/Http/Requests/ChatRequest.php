<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\VideoWithAttributesValidationRule;

class ChatRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'description' => 'nullable|string',
            'image' => 'nullable|file|mimes:jpg,png,jpeg,gif|max:2048', // Adjust the file types and size as needed
            'video' => 'nullable|file|mimes:mp4,mov,avi|max:10240', // Adjust the file types and size as needed
        ];
    }
}
