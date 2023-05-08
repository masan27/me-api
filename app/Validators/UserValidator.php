<?php

namespace App\Validators;

use App\Helpers\ValidationHelper;
use Illuminate\Support\Facades\Validator;

class UserValidator
{
    private ValidationHelper $validationHelper;

    public function __construct(ValidationHelper $validationHelper)
    {
        $this->validationHelper = $validationHelper;
    }

    public function validateChangePasswordInput($request): bool|array
    {
        $validator = Validator::make($request->all(), [
            'new_password' => 'required|string|min:6|max:25',
            'confirm_password' => 'required|string|min:6|max:25|same:new_password'
        ], ValidationHelper::VALIDATION_MESSAGES);

        return $this->validationHelper->getValidationResponse($validator);
    }

    public function validateUpdateUserDetailsInput($request): bool|array
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string|min:3|max:50',
            'gender' => 'required|string|in:pria, wanita',
            'birth_date' => 'required|date_format:Y-m-d',
            'school_origin' => 'required|string|min:3',
            'grade_id' => 'required|integer|exists:grades,id',
            'address' => 'required|string|min:3',
            'phone' => 'required|string|min:3|max:18',
        ], ValidationHelper::VALIDATION_MESSAGES);

        return $this->validationHelper->getValidationResponse($validator);
    }
}
