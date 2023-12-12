<?php
require_once "database/database.php";

$name = isset($_POST['name']) ? $_POST['name'] :"";
$email = isset($_POST['email']) ? $_POST['email'] :"";
$age = isset($_POST['age']) ? $_POST['age'] :"";
$image = isset($_POST['image_url']) ? $_POST['image_url'] :"";
// echo $name."\n";
// echo $age."\n";
// echo $email."\n";
// echo $image."\n";

$value = [
    "name" => $name,
    "email" => $email,
    "age" => $age,
    "profile" => $image,
];
createStudent($value);
header('Location: index.php');