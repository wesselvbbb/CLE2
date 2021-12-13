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
<h1>Overzicht reserveringen:</h1>
<form action="" method="post">
    <label>Zoeken</label>
    <input type="text" name="search" placeholder="zoeken...">
    <input type="submit" name="submit">
</form>
<table>
    <thead>
    <tr>
        <th>Voornaam</th>
        <th>Achternaam</th>
        <th>Tel:</th>
        <th>Mail</th>
        <th>Datum</th>
        <th>Aantal personen</th>
        <th>Opmerking</th>
        <th colspan="2"></th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <td colspan="9">Reserveringen</td>
    </tr>
    </tfoot>
    <tbody>
    <?php foreach ($reservations as $reservation) { ?>
        <tr>
            <td><?= $reservation['first_name'] ?></td>
            <td><?= $reservation['last_name'] ?></td>
            <td><?= $reservation['phone_number'] ?></td>
            <td><?= $reservation['mail'] ?></td>
            <td><?= $reservation['date'] ?></td>
            <td><?= $reservation['total_guests'] ?></td>
            <td><?= $reservation['comment'] ?></td>
            <td><a href="delete.php">Edit</a> </td>
            <td><a href="edit.php">Delete</a></td>
            <td><a href="view.php?id=<?= $reservation['id'] ?>">View</a></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<button><a href="reservation.php">Reserveren</button>
</body>
</html>

