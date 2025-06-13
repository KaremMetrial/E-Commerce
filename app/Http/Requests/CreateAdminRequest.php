<?php

    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;

    class CreateAdminRequest extends FormRequest
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
                'email' => ['required', 'string', 'email', 'max:255', 'exists:admins,email'],
                'password' => ['required', 'string'],
                'remember' => ['boolean'],
                'g-recaptcha-response' => ['required', 'captcha']
            ];
        }
        /**
         * Get the custom messages for the validation rules.
         *
         * @return array<string, string>
         */
        public function messages(): array
        {
            return [
                'g-recaptcha-response.required' => 'Please complete the reCAPTCHA.',
                'g-recaptcha-response.captcha' => 'The reCAPTCHA verification failed, please try again.'
            ];
        }
    }
