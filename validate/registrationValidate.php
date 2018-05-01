<?php

spl_autoload_register(function($class)
{
    include '../../classes/'.$class.'.php';
});

require ('../classes/Form.php');
require ('../classes/FormRegistration.php');
require ('../classes/Db.php');
require ('../classes/Config.php');
require ('../classes/User.php');

    $form = new FormRegistration();
    if(empty($form->getError())){
        $newUser = new User();
        var_dump($newUser->addUser());
    };