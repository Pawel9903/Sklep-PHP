<?php
session_start();

spl_autoload_register(function($class)
{
    include '../classes/'.$class.'.php';
});
$form = new FormLog();
$user = new User();
$user->getUserByEmail($_POST['email']);

if(!empty($user->getUser()->password))
{
    if(password_verify($_POST['password'],$user->getUser()->password))
    {
        $_SESSION['id'] = $user->getUser()->id;
        echo 'success';
    }else
        {
        echo "Nieprawidłowy email lub hasło";
        }
}

