<?php
require_once 'includes/initialize.php';

/** @var $db */
require_once "includes/database.php";

//Get the result set from the database with a SQL query
$query = "SELECT * FROM reservations";
$result = mysqli_query($db, $query);

//Loop through the result to create a custom array
$reservations = [];
while ($row = mysqli_fetch_assoc($result)) {
    $reservations[] = $row;
}

//Close connection
mysqli_close($db);
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
    <title>Home</title>
</head>
<body>
<div class="sticky">
    <nav>
        <div><a href="#">Home</a></div>
        <div><a href="#">Overzicht</a></div>
        <div><a href="#">Reserveren</a></div>
        <div><a href="#">Geschiedenis</a></div>
    </nav>
</div>
<header>
    <h1>Overzicht reserveringen:</h1>
</header>
<br>
<section>
<div class="overview">
    <table>
        <thead>
        <tr>
            <th>Voornaam</th>
            <th>Achternaam</th>
            <th>Tel</th>
            <th>Mail</th>
            <th>Datum</th>
            <th>Tijd</th>
            <th>Aantal personen</th>
            <th>Opmerking</th>
        </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
        <?php foreach ($reservations as $reservation) { ?>
            <tr>
                <td><?= $reservation['first_name'] ?></td>
                <td><?= $reservation['last_name'] ?></td>
                <td><?= $reservation['phone_number'] ?></td>
                <td><?= $reservation['mail'] ?></td>
                <td><?= $reservation['date'] ?></td>
                <td><?= $reservation['reservation_time'] ?></td>
                <td id="guestsfield"><?= $reservation['total_guests'] ?></td>
                <td id="commentfield"><?= $reservation['comment'] ?></td>
                <td><a href="edit.php?id=<?= $reservation['id'] ?>">Edit</a></td>
                <td><a href="delete.php?id=<?= $reservation['id'] ?>">Delete</a></td>
                <td><a href="view.php?id=<?= $reservation['id'] ?>">View</a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <br>
        <button id="reservation_button"><a href="reservation.php">Reserveren</button>
</div>
</section>
</body>
</html>

