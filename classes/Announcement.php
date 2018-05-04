<?php
/**
 * Created by PhpStorm.
 * User: pawel
 * Date: 29.04.2018
 * Time: 18:45
 */

class Announcement
{
    private $announcement;
    private $pdo;

    public function __construct()
    {
       $this->pdo = Db::getInstance()->getPdo();
    }

    public function getAnnouncementById($id)
    {
        $this->announcement = $this->pdo->query("SELECT * FROM announcement AS a WHERE a.id_user = '$id'")->fetchAll();
    }

    public function getAllAnnouncements()
    {
        $this->announcement = $this->pdo->query("SELECT a.name, a.price, a.description, a.add_date, a.end, a.type, u.user_name, u.surname, u.email FROM announcement AS a, users AS u")->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @return mixed
     */
    public function getAnnouncement()
    {
        return $this->announcement;
    }
}