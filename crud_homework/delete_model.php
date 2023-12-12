<?php
require_once "database/database.php";
$id = isset($_GET['id']) ? $_GET['id'] : "";
if($id == ""){
    header('Location: index.php');
}else{
    deleteStudent($id);
    header('Location: index.php');
    
}