<?php

// namespace App\Http\Requests;

// use Illuminate\Foundation\Http\FormRequest;

// class StoreAgencyRequest extends FormRequest
// {
//     /**
//      * Determine if the user is authorized to make this request.
//      */
//     public function authorize(): bool
//     {
//         return false;
//     }

//     /**
//      * Get the validation rules that apply to the request.
//      *
//      * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
//      */
//     public function rules(): array
//     {
//         return [
//             //
//         ];
//     }
// }
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;


class StoreAgencyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'Agency_Name' => 'required|string|max:255',
            'Description' => 'required|string|max:255',
            'Document' => 'required|file|mimes:pdf,doc,docx|max:5120',
            'Image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    protected function failedValidation(Validator $validator)
{
    throw new HttpResponseException(
        redirect()->back()
            ->withErrors($validator, 'agencyErrors')
            ->withInput()
    );
}
}