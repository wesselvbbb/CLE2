<?php
/** @var mysqli $db  */
require_once 'includes/database.php';
require_once 'includes/initialize.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/styles.css"/>
    <title>Reserveren</title>
</head>
<body>
<?php if (isset($errors['db'])) { ?>
    <div><span class="errors"><?= $errors['db']; ?></span></div>
<?php } ?>
        <section>
            <h1>Maak uw reservering</h1>
            <form action="insert.php" method="post">
                <?php
                require_once 'includes/validation.php';
                ?>
                <h3>Voornaam:</h3><input type="text" id="first_name" name="first_name" value="<?= isset($firstname) ? htmlentities($firstname) : '' ?>"/>
                <span class="errors"><?= $errors['first_name'] ?? '' ?></span><br>
                <h3>Achternaam:</h3><input type="text" id="last_name" name="last_name" value="<?= $_POST['last_name'] ?? ''?>"/>
                <span class="errors"><?= $errors['last_name'] ?? '' ?></span><br>
                <h3>Tel:</h3><input id="phone_number" type="tel" name="phone_number" pattern="[06][0-9]{9}" value="<?= $_POST['phone_number'] ?? ''?>"/>
                <span class="errors"><?= $errors['phone_number'] ?? '' ?></span><br>
                <h3>Email:</h3><input type="text" id="email" name="mail" value="<?= $_POST['mail'] ?? ''?>"/>
                <span class="errors"><?= $errors['mail'] ?? '' ?></span><br>
                <h3>Datum:</h3><input type="date" id="date" name="date" value="<?= $_POST['date'] ?? ''?>"/>
                <span class="errors"><?= $errors['date'] ?? '' ?></span><br>
                <h3>Aantal personen:</h3><input type="number" id="total_guests" name="total_guests" value="<?= $_POST['total_guests'] ?? ''?>"/>
                <span class="errors"><?= $errors['total_guests'] ?? '' ?></span><br>
                <h3>Opmerking</h3><textarea rows="4" cols="50" name="comment" placeholder="Plaats uw opmerking" value="<?= $_POST['comment'] ?? ''?>"/></textarea>
                <input type="submit" name="submit" value="send">
            </form>
        </section>
        <button><a href="index.php">Home</button>
</body>
</html>