<?php
require_once "database/database.php";

$name = isset($_POST['name']) ? $_POST['name'] :"";
$email = isset($_POST['email']) ? $_POST['email'] :"";
$age = isset($_POST['age']) ? $_POST['age'] :"";
$image = isset($_POST['image_url']) ? $_POST['image_url'] :"";
$id = isset($_POST['id']) ? $_POST['id'] :"";
// echo $name."\n";
// echo $age."\n";
// echo $email."\n";
// echo $image."\n";

$value = [
    "id" => $id,
    "name" => $name,
    "email" => $email,
    "age" => $age,
    "profile" => $image,
];
updateStudent($value);
header('Location: index.php');