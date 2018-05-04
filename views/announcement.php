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
                    <div class="card-title">Nazwa: <?php echo $item['name_anno'] ?></div>
                    <div class="card-text">Cena: <?php echo $item['price'] ?> zł</div>
                    <div class="card-text">Opis: <?php echo $item['description'] ?></div>
                    <div class="card-text">Właściciel ogłoszenia</div>
                    <div class="card-text">Imię: <?php echo $item['user_name'] ?></div>
                    <div class="card-text">Nazwisko: <?php echo $item['surname'] ?></div>
                    <div class="card-text">Email: <?php echo $item['email'] ?></div>
                    <div class="card-text">Data dodania: <?php echo $item['add_date'] ?></div>
                    <div class="card-text">Koniec Ogłoszenia: <?php echo $item['end_anno'] ?></div>
                    <div class="card-text">Typ: <?php echo $item['category'] ?></div>
                </div>
            <?php endforeach; ?>
        </div>
</div>

<div>
    <div class="container">
        <h2>Dodaj ogłoszenie</h2>

        <div class="alert-danger" id="formAlertA" style="display: none">Uzupełnij Wymagane Pola *</div>


        <form id="formA" method="post" action="../validate/addAnnouncementValidate.php" >
                <fieldset>
                    <label for="name">Nazwa*:</label>
                    <input name="name_anno" id="nameA" type="text"/>
                </fieldset>
                <fieldset>
                    <label for="price">Cena*:</label>
                    <input name="price" id="priceA" type="text"/>
                </fieldset>
                <fieldset>
                    <label for="description">Opis*:</label>
                    <textarea name="description" id="descriptionA" type="text"></textarea>
                </fieldset>
                <fieldset>
                    <label for="end">Data zakończenia*:</label>
                    <input name="end_anno" id="endA" type="date"/>
                </fieldset>
                <fieldset>
                    <label for="type">Kategoria*:</label>
                    <select name="category" id="typeA" type="text">
                        <option value="auta">Auta</option>
                        <option value="motor">Motory</option>
                        <option value="bike">Rowery</option>
                    </select>
                </fieldset>
                    <input type="submit" value="Dodaj" id="submitA">

                </fieldset>
            </form>
    </div>
</div>

<?php include ('templates/footer.php');