<?php
require_once 'includes/database.php';
require_once 'includes/initialize.php';


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
<div class="overview">
    <h2>Overzicht van reservering:</h2>
    <p>Naam: <?= $firstname .' '. $lastname ?></p>
    <p>Telefoonnummer: <?= $phonenumber?></p>
    <p>Email: <?= $mail?></p>
    <p>Datum: <?= $date?></p>
    <p>Aantal personen: <?= $guests?></p>
    <p>Opmerking: <?= $comment?></p>
    <a href="index.php">Home</a>
</div>
</body>

</html>
