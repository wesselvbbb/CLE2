<?php
session_start();

if (isset($_SESSION['loggedInUser'])) {
    $login = true;
} else {
    $login = false;
}

/** @var mysqli $db */
require_once "includes/database.php";

if (isset($_POST['submit'])) {
    $email = mysqli_escape_string($db, $_POST['email']);
    $password = $_POST['password'];

    $errors = [];
    if ($email == '') {
        $errors['email'] = 'Voer een gebruikersnaam in';
    }
    if ($password == '') {
        $errors['password'] = 'Voer een wachtwoord in';
    }

    if (empty($errors)) {
        //Get record from DB based on first name
        $query = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);
            if (password_verify($password, $user['password'])) {
                $login = true;

                $_SESSION['loggedInUser'] = [
                    'email' => $user['email'],
                    'id' => $user['id']
                ];
            } else {
                //error onjuiste inloggegevens
                $errors['loginFailed'] = 'De combinatie van email en wachtwoord is bij ons niet bekend';
            }
        } else {
            //error onjuiste inloggegevens
            $errors['loginFailed'] = 'De combinatie van email en wachtwoord is bij ons niet bekend';
        }
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
    <link rel="stylesheet" href="css/styles.css"/>
    <title>Login</title>
</head>
<body>
<header>
    <h2>Inloggen</h2>
</header>
<section>
<?php if ($login) { ?>
    <p>Je bent ingelogd!</p>
    <p><a href="index.php">Overzicht van reserveringen</a> / <a href="logout.php">Uitloggen</a></p>
<?php } else { ?>
    <form action="" method="post">
        <div>
            <label for="email">Email</label>
            <input id="email" type="text" name="email" placeholder="Email..." value="<?= $email ?? '' ?>"/>
            <span class="errors"><?= $errors['email'] ?? '' ?></span>
        </div>
        <div>
            <label for="password">Wachtwoord</label>
            <input id="password" type="password" name="password" placeholder="Wachtwoord..."/>
            <span class="errors"><?= $errors['password'] ?? '' ?></span>
        </div>
        <div>
            <p class="errors"><?= $errors['loginFailed'] ?? '' ?></p>
            <input type="submit" id="send" name="submit" value="Login"/>
        </div>
    </form>
<?php } ?>
</section>
</body>
</html>
