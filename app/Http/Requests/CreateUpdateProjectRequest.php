<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateUpdateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if(Auth::check()){
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'type_id'=>['required', 'integer'],
            'technologies' => ['array'],
            'technologies'=>['required', 'exists:technologies,id'],
            'name'=>['required', 'string','min:5', 'max:255','unique:projects,name'],
            'description'=>['string'],
            'image_url'=>['nullable','image','max:250'],
            'start_date'=>['required', 'date'],
            'end_date'=>['required', 'date', 'after:start_date'],
            'project_manager'=>['required', 'string', 'min:3', 'max:50'],
        ];
    }
}
