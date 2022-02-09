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
if ($date == "") {
    $errors['date'] = 'Datum mag niet leeg zijn.';
}
if ($reservation_time == "") {
    $errors['reservation_time'] = 'Kies een tijd.';
}

if (!is_numeric($guests)) {
    $errors['total_guests'] = 'Voer een getal in.';
}
// User is not allowed to go over 20 guests limit
if ($guests > 20) {
    $errors['total_guests'] = 'Aantal personen mag niet meer dan 20 zijn.';
}
// this error message wil overwrite the previous error when guests is empty
if ($guests == "") {
    $errors['total_guests'] = 'Aantal personen mag niet leeg zijn.';
}

?>