<?php
include_once 'includes/database.php';
if(isset($_POST['submit']))
{
    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $phonenumber = $_POST['phone_number'];
    $mail = $_POST['mail'];
    $date = $_POST['date_time'];
    $guests = $_POST['total_guests'];
    $comment = $_POST['comment'];
    $sql = "INSERT INTO reservations (first_name,last_name,phone_number,mail,date_time,comment,total_guests)
     VALUES ('$firstname','$lastname','$phonenumber','$mail','$date','$comment','$guests')";
    if (mysqli_query($db, $sql)) {
        echo "Reserving is geplaatst!";
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($db);
    }
    mysqli_close($db);
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Insert Page</title>
</head>

<body>
<div class="overview">
<h2>Overzicht van reservering:</h2>
    <p>Naam:</p>
    <p>Telefoonnummer:</p>
    <p>Email:</p>
    <p>Datum:</p>
    <p>Aantal personen:</p>
    <p>Opmerking:</p>
    <a href="index.php">Home</a>
</div>
</body>

</html>