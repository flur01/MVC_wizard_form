<?php

namespace Validators;

use Core\Validator;

class AddUserValidator extends Validator
{
    public function setConditions()
    {
        $requirement = [
            'firstname' => 'required',
            'lastname' => 'required',
            'birthdate' => 'required',
            'report_subject' => 'required',
            'country' => 'required',
            'phone' => 'required',
            'email' => 'required|email'
        ];

        return $requirement;
    }
}