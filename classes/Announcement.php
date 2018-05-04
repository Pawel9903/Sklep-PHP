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
        $this->announcement = $this->pdo->query("SELECT a.name_anno, a.price, a.description, a.add_date, a.end_anno, a.category, u.user_name, u.surname, u.email FROM announcement AS a, users AS u")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function saveNewAnnouncement($id_user)
    {
        $query = $this->pdo->prepare("INSERT INTO announcement (name_anno, price, description, end_anno, id_user, category) VALUES (:name_anno, :price, :description, :end_anno, :id_user, :category)");
        $a = 2;
        $query->bindParam(':name_anno', $_POST['name_anno']);
        $query->bindParam(':price', $_POST['price']);
        $query->bindParam(':description', $_POST['description']);
        $query->bindParam(':end_anno', $_POST['end_anno']);
        $query->bindParam(':id_user', $id_user);
        $query->bindParam(':category', $_POST['category']);
        $query->execute();
    }

    /**
     * @return mixed
     */
    public function getAnnouncement()
    {
        return $this->announcement;
    }
}