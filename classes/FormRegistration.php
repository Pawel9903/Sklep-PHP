<?php
/**
 * Created by PhpStorm.
 * User: pawel
 * Date: 01.05.2018
 * Time: 12:26
 */

class FormRegistration extends Form
{
    private $requireFields = array('name','surname','email','phone','date');

    public function __construct(){
        $this->getDataPost();
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