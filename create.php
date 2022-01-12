<?php
/** @var mysqli $db */


//Check if Post isset, else do nothing
if (isset($_POST['submit'])) {
    //Require database in this file
    require_once "includes/database.php";

    //Postback with the data showed to the user, first retrieve data from 'Super global'
    $firstname   = mysqli_escape_string($db, $_POST['first_name']);
    $lastname = mysqli_escape_string($db, $_POST['last_name']);
    $phonenumber  = mysqli_escape_string($db, $_POST['phone_number']);
    $mail   = mysqli_escape_string($db, $_POST['mail']);
    $date = mysqli_escape_string($db, $_POST['date']);
    $guests = mysqli_escape_string($db, $_POST['total_guests']);
    $comment = mysqli_escape_string($db, $_POST['comment']);

    //Require the form validation handling
    require_once "includes/validation.php";

        //Save the record to the database
        $query = "INSERT INTO reservations (first_name,last_name,phone_number,mail,date,comment,total_guests)
                VALUES ('$firstname','$lastname','$phonenumber','$mail','$date','$comment','$guests')";
        $result = mysqli_query($db, $query) or die('Error: '.mysqli_error($db). ' with query ' . $query);

        if ($result) {
            header('Location: index.php');
            exit;
        } else {
            $errors['db'] = 'Something went wrong in your database query: ' . mysqli_error($db);
        }

        //Close connection
        mysqli_close($db);
}
?>
<!doctype html>
<html lang="en">
<head>
    <title>Reserveren</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<h1>Create album</h1>
<?php if (isset($errors['db'])) { ?>
    <div><span class="errors"><?= $errors['db']; ?></span></div>
<?php } ?>

<!-- enctype="multipart/form-data" no characters will be converted -->
<form action="" method="post" enctype="multipart/form-data">
    <div class="data-field">
        <label for="first_name">Voornaam</label>
        <input id="first_name" type="text" name="first_name" value="<?= isset($firstname) ? htmlentities($firstname) : '' ?>"/>
        <span class="errors"><?= $errors['first_name'] ?? '' ?></span>
    </div>
    <div class="data-field">
        <label for="last_name">Achternaam</label>
        <input id="last_name" type="text" name="last_name" value="<?= isset($lastname) ? htmlentities($lastname) : '' ?>"/>
        <span class="errors"><?= $errors['last_name'] ?? '' ?></span>
    </div>
    <div class="data-field">
        <label for="phone_number">Telefoonnummer</label>
        <input id="phone_number" type="text" name="phone_number" value="<?= isset($phonenumber) ? htmlentities($phonenumber) : '' ?>"/>
        <span class="errors"><?= $errors['phone_number'] ?? '' ?></span>
    </div>
    <div class="data-field">
        <label for="mail">Email</label>
        <input id="mail" type="text" name="mail" value="<?= isset($mail) ? htmlentities($mail) : '' ?>"/>
        <span class="errors"><?= $errors['mail'] ?? '' ?></span>
    </div>
    <div class="data-field">
        <label for="date">Datum</label>
        <input id="date" type="date" name="date" value="<?= isset($date) ? htmlentities($date) : '' ?>"/>
        <span class="errors"><?= $errors['date'] ?? '' ?></span>
    </div>
    <div class="data-field">
        <label for="date">Guests</label>
        <input id="date" type="number" name="date" value="<?= isset($date) ? htmlentities($date) : '' ?>"/>
        <span class="errors"><?= $errors['date'] ?? '' ?></span>
    </div>
    <div class="data-field">
        <label for="comments">Opmerking</label>
        <textarea rows="4" cols="50" name="comment" placeholder="Plaats uw opmerking" value="<?= $_POST['comment'] ?? ''?>"/></textarea>
        <span class="errors"><?= $errors['comment'] ?? '' ?></span>
    </div>
    <div class="data-submit">
        <input type="submit" name="submit" value="Opslaan"/>
    </div>
</form>
<div>
    <a href="index.php">Go back to the list</a>
</div>
</body>
</html>

