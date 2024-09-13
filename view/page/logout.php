<?php 

session_start();

unset($_SESSION['usuario']);
header('Location: http://localhost/Crud-POO/view/page/login.php');