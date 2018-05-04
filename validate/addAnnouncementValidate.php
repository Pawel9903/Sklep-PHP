<?php
session_start();
spl_autoload_register(function($class)
{
    include '../classes/'.$class.'.php';
});

$id_user = $_SESSION['id'];

$announcemet = new Announcement();

$announcemet->saveNewAnnouncement($id_user);
