<?php
require_once 'includes/initialize.php';

/** @var mysqli $db */


// redirect when uri does not contain a id
if (!isset($_GET['id']) || $_GET['id'] == '') {
    // redirect to index.php
    header('Location: index.php');
    exit;
}

//Require database in this file
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

$reservation = mysqli_fetch_assoc($result);
$firstname = $reservation['first_name'];
$lastname = $reservation['last_name'];
$phonenumber = $reservation['phone_number'];
$mail = $reservation['mail'];
$date = $reservation['date'];
$reservation_time = $reservation['reservation_time'];
$guests = $reservation['total_guests'];
$comment = $reservation['comment'];

//Close connection
mysqli_close($db);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/styles.css"/>
    <title>Overzicht</title>
</head>

<body>
<header>
    <h1>Reservering maken:</h1>
</header>
<br>
<section id="overview">
    <h2>Overzicht van reservering:</h2>
    <div class="info">
        <h4>Naam:</h4>
        <p><?= $firstname . ' ' . $lastname ?></p>
        <h4>Telefoonnummer:</h4>
        <p><?= $phonenumber ?></p>
        <h4>Email:</h4>
        <p><?= $mail ?></p>
        <h4>Datum:</h4>
        <p><?= $date ?></p>
        <h4>Tijd:</h4>
        <p><?= $reservation_time ?></p>
        <h4>Aantal personen:</h4>
        <p><?= $guests ?></p>
        <h4>Opmerking:</h4>
        <p><?= $comment ?></p>
    </div>
    <button id="reservation_button"><a href="index.php">Home</a></button>
</section>
</body>

</html>
