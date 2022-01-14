<?php

namespace App\Http\Requests\Api\Post;

use App\Helpers\ResponseHelper;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class StorePostRequest extends FormRequest
{
    /**
     * @url https://dev.to/secmohammed/laravel-form-request-tips-tricks-2p12
     * @url https://thietkewebfull.com/how-to-validate-form-request-with-laravel
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'name' => 'bail|required|max:255',
        ];
        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tiêu đề.',
            'name.max' => 'Tiêu đề không quá 255 ký tự.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            ResponseHelper::error($validator->errors()->first(), [], 422),
            422
        );

        // throw new HttpResponseException(response()->json(['errors' => $validator->errors()], 422));

        // $response = new Response(['error' => $validator->errors()->first()], 422);
        // throw new ValidationException($validator, $response);
        // throw (new ValidationException($validator))
        //     ->errorBag($this->errorBag)
        //     ->redirectTo($this->getRedirectUrl());
    }
}
