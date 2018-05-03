
<?php
/**
 * Created by PhpStorm.
 * User: pawel
 * Date: 29.04.2018
 * Time: 18:45
 */

abstract class Form
{
    protected $error = array();


    public function ifEmptyFields($requireFields)
    {
        foreach ($requireFields as $field => $value)
        {
            if($_POST[$value] == '')
            {
                $this->error[$field] = "Uzupełnij pole ".$value;
            }
        }
    }

    public function validateEmail()
    {
        if(!empty($_POST['email'])&& !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
        {
            $this->error[2] = "Nieprawidłowy emial";
        }
    }

    public function validatePhone()
    {
        if(!empty($_POST['phone']) && (!is_numeric($_POST['phone'])))
        {
            $this->error[3] = "Nieprawidłowy numer telefonu";
        }
    }

    public function showError(){
        foreach ($this->error as $message)
        {
            echo "<li>".$message."</li>";
        }
    }


    /**
     * @return array
     */
    public function getError(): array
    {
        return $this->error;
    }
}