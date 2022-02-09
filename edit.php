<?php
//Controleer of user is ingelogd en de juiste rol heeft
session_start();

if (!isset($_SESSION['loggedInUser'])) {
    //Als gebruiker niet is ingelogd
    //Redirect naar login pagina
    header("Location: login.php");
    exit;
}

/** @var mysqli $db */

require_once "includes/database.php";

//Retrieve the GET parameter from the 'Super global'
$reservationId = mysqli_escape_string($db, $_GET['id']);

//Get the record from the database result
$query = "SELECT * FROM reservations WHERE id = '$reservationId'";
$result = mysqli_query($db, $query)
or die ('Error: ' . $query);

if (mysqli_num_rows($result) != 1) {
    // redirect when db returns no result
    header('Location: index.php');
    exit;
}

if (isset($_GET['id']) && isset($_POST['update'])) {
    $reservationId = $_GET['id'];
    $firstname   = htmlentities(mysqli_escape_string($db, $_POST['first_name']));
    $lastname = htmlentities(mysqli_escape_string($db, $_POST['last_name']));
    $phonenumber  = htmlentities(mysqli_escape_string($db, $_POST['phone_number']));
    $mail   = mysqli_escape_string($db, $_POST['mail']);
    $date = htmlentities(mysqli_escape_string($db, $_POST['date']));
    $reservation_time = htmlentities(mysqli_escape_string($db, $_POST['reservation_time']));
    $guests = htmlentities(mysqli_escape_string($db, $_POST['total_guests']));
    $comment = htmlentities(mysqli_escape_string($db, $_POST['comment']));



    require_once "includes/validation.php";

    if (empty($errors)) {
        //    Reservering wordt geupdate in de database door SQL Update Statement
        mysqli_query($db, "UPDATE reservations SET first_name='$firstname', last_name='$lastname', phone_number='$phonenumber', 
                                mail='$mail', date='$date', reservation_time='$reservation_time', total_guests='$guests', comment='$comment' WHERE id = $reservationId");
        $_SESSION['message'] = "Reservering bijgewerkt!";
        //    Redirect gebruiker naar Home pagina
        header('location: index.php');

        //Close connection
        mysqli_close($db);
    }
}

$reservation = mysqli_fetch_assoc($result);
$firstname = $reservation['first_name'];
$lastname = $reservation['last_name'];
$phonenumber = $reservation['phone_number'];
$mail = $reservation['mail'];
$date = $reservation['date'];
$reservation_time = $reservation['reservation_time'];
$guests = $reservation['total_guests'];
$comment = $reservation['comment'];


//           Als gebruiker wel is ingelogd en de juiste rol heeft
//                       Laat reserveringen zien
//                       Maak een formulier aan die gebruiker kan aanpassen;
//                                               Voornaam
//                                               Achternaam
//                                               Telefoonnummer
//                                               Mail
//                                               Datum
//                                               Tijd
//                                               Aantal personen
//                                               Opmerkingen
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
    <title>Bewerken</title>
</head>
<body>
<?php if (isset($errors['db'])) { ?>
    <div><span class="errors"><?= $errors['db']; ?></span></div>
<?php } ?>
<header>
    <h1>Reservering bewerken:</h1>
</header><br>
<section>
    <form action="" method="post">
        <label for="first_name">Voornaam:</label>
        <input type="text" id="first_name" name="first_name" placeholder="Voornaam..." value="<?= isset($firstname) ? htmlentities($firstname) : '' ?>"/>
        <span class="errors"><?= $errors['first_name'] ?? '' ?></span><br>
        <label for="last_name">Achternaam:</label>
        <input type="text" id="last_name" name="last_name" placeholder="Achternaam..." value="<?= isset($lastname) ? htmlentities($lastname) : '' ?>" />
        <span class="errors"><?= $errors['last_name'] ?? '' ?></span><br>
        <label for="phone_number">Tel:</label>
        <input id="phone_number" type="tel" name="phone_number" placeholder="Telefoon..." value="<?= isset($phonenumber) ? htmlentities($phonenumber) : '' ?>"/>
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
        <input type="text" id="comment" name="comment"
               value="<?= $comment ?>"/><br>
        <!--    Met een knop opslaan van ingevoerde gegevens    -->
        <input type="submit" id="send" name="update" value="Update">
        <input type="hidden" name="id" value="<?= $reservationId ?>">
    </form>
    <button id="reservation_button"><a href="index.php">Terug</button>
</section>
</body>
</html>