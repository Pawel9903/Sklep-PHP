<?php
include('templates/head.php');
?>

<section class="row">
    <div class="col-md-6">
        <h3>Zarejstruj się</h3>
            <form action="../validate/registrationValidate.php" method="post" >

                <fieldset>
                    <label for="name">Imię*:</label>
                    <input name="name" id="name" type="text" value="" >
                    <div class="alert-danger"></div>
                </fieldset>

                <fieldset>
                    <label for="surname">Nazwisko*:</label>
                    <input name="surname" id="surname" type="text" value="">
                    <div class="alert-danger"></div>
                </fieldset>

                <fieldset>
                    <label for="email">Email*:</label>
                    <input name="email" id="email" type="text" value="">
                    <div class="alert-danger"></div>
                </fieldset>

                <fieldset>
                    <label for="password">Password*:</label>
                    <input name="password" id="password" type="password" value="">
                    <div class="alert-danger"></div>
                </fieldset>

                <fieldset>
                    <label for="phone">Telefon*:</label>
                    <input name="phone" id="phone" type="text" value="">
                    <div class="alert-danger"></div>
                </fieldset>

                <fieldset>
                    <label for="date" id="a">Data urodzenia*:</label>
                    <input name="date" id="date" type="text" value="">
                    <div class="alert-danger"></div>
                </fieldset>

                <input type="button" name="submit" id="submitRegister" value="Wyślij" >

            </form>

        <div class="alert-danger" id="responseRegistration"></div>
    </div>
    <div class="col-md-6">
        <h3>Zaloguj się</h3>
            <form action="../validate/logValidate.php" method="post">

                <fieldset>
                    <label for="email">Email:</label>
                    <input name="email" id="emailLog" type="text" value="">
                    <div class="alert-danger"></div>
                </fieldset>

                <fieldset>
                    <label for="password">Password:</label>
                    <input name="password" id="passwordLog" type="password" value="">
                    <div class="alert-danger"></div>
                </fieldset>

                <input type="button" name="submit" id="submitLog" value="Zaloguj" >

            </form>

        <div class="alert-danger" id="responseLog"></div>
    </div>
</section>

<?php
include ('templates/footer.php');
