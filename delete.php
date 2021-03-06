<?php
/** @var mysqli $db */

require_once "includes/database.php";

if (isset($_POST['submit'])) {
    // Get the record from the database result
    $reservationId = mysqli_escape_string($db, $_POST['id']);
    $query = "SELECT * FROM reservations WHERE id = '$reservationId'";
    $result = mysqli_query($db, $query) or die ('Error: ' . $query);

    $reservation = mysqli_fetch_assoc($result);

    // DELETE DATA
    // Remove the reservation data from the database with the existing reservationId
    $query = "DELETE FROM reservations WHERE id = '$reservationId'";
    mysqli_query($db, $query) or die ('Error: ' . mysqli_error($db));

    //Close connection
    mysqli_close($db);

    //Redirect to homepage after deletion & exit script
    header("Location: index.php");
    exit;

} else if (isset($_GET['id']) || $_GET['id'] != '') {
    //Retrieve the GET parameter from the 'Super global'
    $reservationId = mysqli_escape_string($db, $_GET['id']);

    //Get the record from the database result
    $query = "SELECT * FROM reservations WHERE id = '$reservationId'";
    $result = mysqli_query($db, $query) or die ('Error: ' . $query);

    if (mysqli_num_rows($result) == 1) {
        $reservation = mysqli_fetch_assoc($result);
    } else {
        // redirect when db returns no result
        header('Location: index.php');
        exit;
    }
} else {
    // Id was not present in the url OR the form was not submitted

    // redirect to index.php
    header('Location: index.php');
    exit;
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
    <title>Delete - <?= $reservation['mail'] ?></title>
</head>
<body>
<header>
    <h1>Reservering verwijderen:</h1>
</header><br>
<section>
<h2>Delete - <?= $reservation['mail'] ?></h2>
<form action="" method="post">
    <p>
        Weet u zeker dat u de reservatie van "<?= $reservation['mail'] ?>" op: "<?= $reservation['date']?>" om: "<?= $reservation['reservation_time']?>" wilt verwijderen?
    </p>
    <input type="hidden" name="id" value="<?= $reservation['id'] ?>"/>
    <input type="submit" name="submit" id="delete" value="Verwijderen"/>
    <button id="reservation_button"><a href="index.php">Terug</button>
</form>
</section>
</body>
</html>
