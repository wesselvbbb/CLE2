<?php
/** @var mysqli $db */


//Check if Post isset, else do nothing
if (isset($_POST['submit'])) {
    //Require database in this file
    require_once "includes/database.php";

    //Postback with the data showed to the user, first retrieve data from 'Super global'
    $firstname   = htmlentities(mysqli_escape_string($db, $_POST['first_name']));
    $lastname = htmlentities(mysqli_escape_string($db, $_POST['last_name']));
    $phonenumber  = htmlentities(mysqli_escape_string($db, $_POST['phone_number']));
    $mail   = mysqli_escape_string($db, $_POST['mail']);
    $date = htmlentities(mysqli_escape_string($db, $_POST['date']));
    $reservation_time = htmlentities(mysqli_escape_string($db, $_POST['reservation_time']));
    $guests = htmlentities(mysqli_escape_string($db, $_POST['total_guests']));
    $comment = htmlentities(mysqli_escape_string($db, $_POST['comment']));

    //Require the form validation handling
    require_once "includes/validation.php";

    if(empty($errors)) {
        //Save the record to the database
        $query = "INSERT INTO reservations (first_name,last_name,phone_number,mail,date,comment,total_guests, reservation_time)
                    VALUES ('$firstname','$lastname','$phonenumber','$mail','$date','$comment','$guests','$reservation_time')";

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
<header>
    <h1>Reservering maken:</h1>
</header><br>
    <section id="create">
        <h1>Maak uw reservering</h1>
        <form action="" method="post">
            <label for="first_name">Voornaam:</label>
            <input type="text" id="first_name" name="first_name" placeholder="Voornaam..." value="<?= isset($firstname) ? htmlentities($firstname) : '' ?>"/>
            <span class="errors"><?= $errors['first_name'] ?? '' ?></span><br>
            <label for="last_name">Achternaam:</label>
            <input type="text" id="last_name" name="last_name" placeholder="Achternaam..." value="<?= isset($lastname) ? htmlentities($lastname) : '' ?>" />
            <span class="errors"><?= $errors['last_name'] ?? '' ?></span><br>
            <label for="phone_number">Tel:</label>
            <input id="phone_number" type="tel" name="phone_number" placeholder="Telefoon..." pattern="[06][0-9]{9}" value="<?= isset($phonenumber) ? htmlentities($phonenumber) : '' ?>"/>
            <span class="errors"><?= $errors['phone_number'] ?? '' ?></span><br>
            <label for="email">Email:</label>
            <input type="text" id="email" name="mail" placeholder="Email..." value="<?= isset($mail) ? htmlentities($mail) : '' ?>" />
            <span class="errors"><?= $errors['mail'] ?? '' ?></span><br>
            <label for="date">Datum:</label>
            <input type="date" id="date" name="date" value="<?= isset($date) ? htmlentities($date) : '' ?>" />
            <span class="errors"><?= $errors['date'] ?? '' ?></span><br>
            <label for="reservation_time">Tijd:</label>
            <input type="text" id="reservation_time" name="reservation_time" placeholder="Tijd..." value="<?= isset($reservation_time) ? htmlentities($reservation_time) : '' ?>" />
            <span class="errors"><?= $errors['reservation_time'] ?? '' ?></span><br>
            <label for="total_guests">Aantal personen:</label>
            <input type="number" id="total_guests" name="total_guests" placeholder="Aantal personen..." value="<?= isset($guests) ? htmlentities($guests) : '' ?>"  />
            <span class="errors"><?= $errors['total_guests'] ?? '' ?></span><br>
            <label for="comment">Opmerking:</label>
            <textarea rows="4" cols="50" name="comment" id="comment" placeholder="Plaats uw opmerking" value="<?= $_POST['comment'] ?? ''?>"/></textarea><br>
            <input type="submit" id="send" name="submit" value="Reserveren">
        </form>
        <button id="reservation_button"><a href="index.php">Home</button>
    </section>

</body>
</html>