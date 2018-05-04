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
    private $last_id;

    public function __construct()
    {
        $this->pdo = Db::getInstance()->getPdo();
    }

    public function getUserByEmail($email)
    {
            $this->user = $this->pdo->query("SELECT * FROM users WHERE email = '$email'")->fetch();

    }

    public function getAllUsers()
    {
       return $this->pdo->query("SELECT * FROM users")->fetchAll();
    }

    public function addUser()
    {
        $query = $this->pdo->prepare("INSERT INTO users (user_name, surname, email, password, phone, join_date) VALUES (:user_name, :surname, :email, :password, :phone, :join_date)");
        $query->bindParam(':user_name',$_POST['name']);
        $query->bindParam(':surname',$_POST['surname']);
        $query->bindParam(':email',$_POST['email']);
        $query->bindParam(':password',password_hash($_POST['password'], PASSWORD_BCRYPT));
        $query->bindParam(':phone',$_POST['phone']);
        $query->bindParam(':join_date',$_POST['date']);
        $query->execute();

        $this->last_id = $this->pdo->lastInsertId();
    }

    public function ifEmailExists()
    {
        $query = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $query->bindParam(':email',$_POST['email']);
        $query->execute();
        if($query->fetch())
        {
            return true;
        }else
        {
            return false;
        }
    }

    public function ifAccountExists($password)
    {
        $query = $this->pdo->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
        $query->bindParam(':email',$_POST['email']);
        $query->bindParam(':password',$password);
        $query->execute();
        if($query->fetch())
        {
            return true;
        }else
        {
            return false;
        }
    }

    /**
     * @return mixed
     */
    public function getLastId()
    {
        return $this->last_id;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }
}

