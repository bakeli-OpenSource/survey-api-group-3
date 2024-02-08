<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
                'name' => ['string','max:255'],
                'email' => ['email', Rule::unique('utilisateurs')->ignore($this->id, 'id')],
                'telephone' => ['numeric', Rule::unique('utilisateurs')->ignore($this->id, 'id')],
                'password' => ['string',Hash::make([
                    'round' => 12
                    ])]
            ];           
        }
    
        public function failedValidation(Validator $validator)
        {
            throw new HttpResponseException(response()->json([
                'success'=> false,
                'status_code' => 422,
                'error'=> true,
                'message'=>"erreur de validation",
                'errorsList'=> $validator->errors()
            ]));
        }
    
        public function messages()
        {
            return [
                'name.string' => "nom invalide",
                'email.email' => "email invalide",
                'email.unique' => "cette email existe déjà",
                'telephone.numeric' => "numero invalide"
            ];
            
        }
    
}
