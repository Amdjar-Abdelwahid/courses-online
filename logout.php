<?php
session_start();
$_SESSION["email"]=="";
session_unset('email');
header('Location:index.php');
?>