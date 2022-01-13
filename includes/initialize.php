<?php
require_once 'includes/database.php';

if (isset($_POST['submit'])){
    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $phonenumber = $_POST['phone_number'];
    $mail = $_POST['mail'];
    $date = $_POST['date'];
    $reservation_time = $_POST['reservation_time'];
    $guests = $_POST['total_guests'];
    $comment = $_POST['comment'];
}

