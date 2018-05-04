<?php

spl_autoload_register(function($class)
{
    include '../classes/'.$class.'.php';
});

session_start();
if(empty($_SESSION['id']))
{
    header('Location:home.php');
}else
{
    echo $_SESSION['id'];
}

$announcement = new Announcement();
$announcement->getAllAnnouncements();
$items = $announcement->getAnnouncement();
?>

<?php include ('templates/head.php'); ?>


<div class="container text-center">
        <div class="row">
            <?php foreach ($items as $item):?>
                <div class="card col-md-6 offset-3 my-3">
                    <div class="card-title">Nazwa: <?php echo $item['name'] ?></div>
                    <div class="card-text">Cena: <?php echo $item['price'] ?> zł</div>
                    <div class="card-text">Opis: <?php echo $item['description'] ?></div>
                    <div class="card-text">Właściciel ogłoszenia</div>
                    <div class="card-text">Imię: <?php echo $item['user_name'] ?></div>
                    <div class="card-text">Nazwisko: <?php echo $item['surname'] ?></div>
                    <div class="card-text">Email: <?php echo $item['email'] ?></div>
                    <div class="card-text">Data dodania: <?php echo $item['add_date'] ?></div>
                    <div class="card-text">Koniec Ogłoszenia: <?php echo $item['end'] ?></div>
                    <div class="card-text">Typ: <?php echo $item['type'] ?></div>
                </div>
            <?php endforeach; ?>
        </div>
</div>

