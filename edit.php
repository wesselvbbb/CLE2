<?php
//Controleer of user is ingelogd en de juiste rol heeft
session_start();

if (!isset($_SESSION['loggedInUser'])) {
    //Als gebruiker niet is ingelogd of niet de juiste rol heeft.
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
    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $phonenumber = $_POST['phone_number'];
    $mail = $_POST['mail'];
    $date = $_POST['date'];
    $reservation_time = $_POST['reservation_time'];
    $guests = $_POST['total_guests'];
    $comment = $_POST['comment'];

//    Reservering wordt geupdate in de database door SQL Update Statement
    mysqli_query($db, "UPDATE reservations SET first_name='$firstname', last_name='$lastname', phone_number='$phonenumber', 
                                mail='$mail', date='$date', reservation_time='$reservation_time', total_guests='$guests', comment='$comment' WHERE id = $reservationId");
    $_SESSION['message'] = "Reservering bijgewerkt!";
//    Redirect gebruiker naar Home pagina
    header('location: index.php');
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

// Valideer ingevoerde velden
//  Als er errors zijn
//        Toon gebruiker de juiste error(s) bij het verkeerd ingevoerde veld
//  Als er geen errors zijn:
//         Toon succesvol bericht

//Close connection
mysqli_close($db);

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
<header>
    <h1>Reservering bewerken:</h1>
</header><br>
<section>
    <form action="" method="post">
        <label for="first_name">Voornaam:</label>
        <input type="text" id="first_name" name="first_name"
               value="<?= $firstname ?>"/>
        <label for="last_name">Achternaam:</label>
        <input type="text" id="last_name" name="last_name"
               value="<?= $lastname ?>"/>
        <label for="phone_number">Telefoon:</label>
        <input type="text" id="phone_number" name="phone_number"
               value="<?= $phonenumber ?>"/>
        <label for="mail">Email:</label>
        <input type="text" id="mail" name="mail"
               value="<?= $mail ?>"/>
        <label for="date">Datum:</label>
        <input type="date" id="date" name="date"
               value="<?= $date ?>"/>
        <label for="reservation_time">Tijd:</label>
        <input type="text" id="reservation_time" name="reservation_time"
               value="<?= $reservation_time ?>"/>
        <label for="total_guests">Aantal personen:</label>
        <input type="number" id="total_guests" name="total_guests"
               value="<?= $guests ?>"/>
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