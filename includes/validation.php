<?php
require_once 'includes/initialize.php';

//Check if data is valid & generate error if not so
$errors = [];
if ($firstname == "") {
    $errors['first_name'] = 'Vul hier uw voornaam in.';
}
if ($lastname == "") {
    $errors['last_name'] = 'Vul hier uw achternaam in.';
}
if ($phonenumber == "") {
    $errors['phone_number'] = 'Vul hier uw telefoonnummer in.';
}
if ($mail == "") {
    $errors['mail'] = 'Vul hier uw email in.';
}

if (!is_numeric($date) || strlen($date) != 4) {
    $errors['date'] = 'Voer een juiste datum in';
}

// this error message wil overwrite the previous error when year is empty
if ($date == "") {
    $errors['date'] = 'Datum mag niet leeg zijn.';
}
if (!is_numeric($guests)) {
    $errors['total_guests'] = 'Voer een getal in.';
}
if ($guests > 20) {
    $errors['total_guests'] = 'Aantal personen mag niet meer dan 20 zijn.';
}
// this error message wil overwrite the previous error when tracks is empty
if ($guests == "") {
    $errors['total_guests'] = 'Aantal personen mag niet leeg zijn.';
}

?>