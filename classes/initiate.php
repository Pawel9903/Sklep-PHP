<?php
/**
 * Created by PhpStorm.
 * User: pawel
 * Date: 29.04.2018
 * Time: 17:57
 */

spl_autoload_register(function($class)
{
    include 'classes/'.$class.'.php';
});