<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest {
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
            'name' => 'required|string|max:50',
            'email' => 'required|email',//unique:profiles,email
            'password' => 'required|min:6|confirmed',
            'bio' => 'required|string',
            'image'=> 'required|image|mimes:jpeg,png,jpg,svg|max:2048',//value en kilobite
        ];
    }
/*  public function messages()
    {
        return [
        'name.required' => 'Le champ Nom est requis.',
        'age.min' => 'L\'âge doit être supérieur à 0.',
        'email.email' => 'Veuillez entrer une adresse 
        email valide.',
        ];
    }
*/
}
