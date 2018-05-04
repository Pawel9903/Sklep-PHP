<?php
/**
 * Created by PhpStorm.
 * User: pawel
 * Date: 01.05.2018
 * Time: 12:26
 */

class FormLog extends Form
{
    private $requireFields = array('email','password');

    public function __construct(){
        $this->getError($this->getRequireFields());
        $this->ifEmptyFields($this->getRequireFields());
        $this->validateEmail();
        $this->validatePhone();
        $this->showError();
    }


    /**
     * @return array
     */
    public function getRequireFields(): array
    {
        return $this->requireFields;
    }

}