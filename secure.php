<?php
session_start();

//May I even visit this page?
if (!isset($_SESSION['loggedInUser'])) {
    header("Location: login.php");
    exit;
}


//Get email from session
$email = $_SESSION['loggedInUser']['email'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="stylesheet" href="css/styles.css"/>
    <title>Veilige pagina</title>
</head>
<body>
<header>
    <h2>Secure page</h2>
</header>
<section>
    <p>Dit is de beveiligde pagina. Hier mag je alleen komen als je ingelogd bent.</p>
    <p>Welkom, <?= $email ?></p>
    <p><a href="logout.php">Uitloggen</a></p>
</section>
</body>
</html>
