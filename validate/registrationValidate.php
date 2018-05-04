<?php
session_start();

spl_autoload_register(function($class)
{
    include '../classes/'.$class.'.php';
});
    $form = new FormRegistration();
    $newUser = new User();
    $exists = $newUser->ifEmailExists();
    if($exists == true)
    {
        echo "<li>Podany email już istnieje</li>";
    }
    if(empty($form->getError()) && $exists == false){
        $newUser->addUser();
        $_SESSION['id'] = $newUser->getLastId();
        echo 'success';
    };