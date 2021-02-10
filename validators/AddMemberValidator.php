<?php

namespace Validators;

use Core\Validator;

class AddMemberValidator extends Validator
{
    public function setConditions()
    {
        $requirement = [
            'company' => 'required',
            'position' => 'required',
            'about_me' => 'required',
            'image' => 'required|image',
        ];

        return $requirement;
    }
}