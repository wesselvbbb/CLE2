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

    if(empty($errors)) {
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
}
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
        <form action="" method="post">
            <label for="first_name">Voornaam:</label>
            <input type="text" id="first_name" name="first_name" value="<?= isset($firstname) ? htmlentities($firstname) : '' ?>"/>
            <span class="errors"><?= $errors['first_name'] ?? '' ?></span><br>
            <label for="last_name">Achternaam:</label>
            <input type="text" id="last_name" name="last_name" value="<?= $_POST['last_name'] ?? ''?>" />
            <span class="errors"><?= $errors['last_name'] ?? '' ?></span><br>
            <label for="phone_number">Tel:</label>
            <input id="phone_number" type="tel" name="phone_number" pattern="[06][0-9]{9}" value="<?= $_POST['phone_number'] ?? ''?>"/>
            <span class="errors"><?= $errors['phone_number'] ?? '' ?></span><br>
            <label for="email">Email:</label>
            <input type="text" id="email" name="mail" value="<?= $_POST['mail'] ?? ''?>" />
            <span class="errors"><?= $errors['mail'] ?? '' ?></span><br>
            <label for="date">Datum:</label>
            <input type="date" id="date" name="date" value="<?= $_POST['date'] ?? ''?>" />
            <span class="errors"><?= $errors['date'] ?? '' ?></span><br>
            <label for="total_guests">Aantal personen:</label>
            <input type="number" id="total_guests" name="total_guests" value="<?= $_POST['total_guests'] ?? ''?>"  />
            <span class="errors"><?= $errors['total_guests'] ?? '' ?></span><br>
            <label for="comment">Opmerking:</label>
            <textarea rows="4" cols="50" name="comment" id="comment" placeholder="Plaats uw opmerking" value="<?= $_POST['comment'] ?? ''?>"/></textarea>
            <input type="submit" name="submit" value="send">
        </form>
    </section>
    <button><a href="index.php">Home</button>
</body>
</html>