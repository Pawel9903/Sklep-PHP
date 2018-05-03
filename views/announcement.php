<?php
session_start();
if(empty($_SESSION['id']))
{
    header('Location:home.php');
}else
{
    echo $_SESSION['id'];
}