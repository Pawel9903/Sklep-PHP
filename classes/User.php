<?php
/**
 * Created by PhpStorm.
 * User: pawel
 * Date: 29.04.2018
 * Time: 18:43
 */

class User
{
    private $pdo;
    private $user;

    public function __construct()
    {
        $this->pdo = Db::getInstance()->getPdo();
    }

    public function getAllUsers()
    {
       return $this->pdo->query("SELECT * FROM users")->fetchAll();
    }

    public function addUser()
    {
        $query = $this->pdo->prepare("INSERT INTO users (user_name, surname, email, phone, join_date) VALUES (:user_name, :surname, :email, :phone, :join_date)");
        $query->bindParam(':user_name',$_POST['name']);
        $query->bindParam(':surname',$_POST['surname']);
        $query->bindParam(':email',$_POST['email']);
        $query->bindParam(':phone',$_POST['phone']);
        $query->bindParam(':join_date',$_POST['date']);
        $query->execute();
    }
}