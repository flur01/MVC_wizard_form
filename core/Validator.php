<?php


namespace Core;

class Validator
{
    protected $validateData;

    protected $messages = [
        'required' => 'Fill all fields',
        'email' => 'Incorrect email address',
        'image' => 'Selected file is not an image'
    ];

    public function __construct($validateData)
    {
        $this->validateData = $validateData;
    }

    public function validate()
    {
        $requirement =  $this->setConditions();
        
        foreach ($this->validateData as $fieldName => $fieldData) {
            if (array_key_exists($fieldName, $requirement)) {
                $methods =  explode('|',$requirement[$fieldName]);

                foreach ($methods as $method) {
                    $val = call_user_func(array($this, $method), $fieldData);
                    if (!$val) {
                        return $this->messages[$method];
                    } 
                }

                
            }
        }
        return true;
    
    }

    public function setConditions()
    {
        $requirement = [];

        return $requirement;
    }

    protected function required($field)
    {
        if (is_array($field)) {
            if (array_key_exists('name', $field)) {
                return (bool)$field['name'];
            }
        }

        if ($field) {
            return true;
        }

        return false;
        
    }

    protected function email($field)
    {
        $firstCheck = strpos($field, '@');
        
        $secondCheck = strpos($field, '.');
        
        return ($firstCheck !== false && $secondCheck !== false);
        
    }


    protected function image($field)
    {
        $fileType = explode('/', $field['type'])[0];
        return $fileType == 'image';
    }

}