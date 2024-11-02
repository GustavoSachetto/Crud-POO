<?php 

session_start();

unset($_SESSION['usuario']);

header('Location: '. URL .'/view/page/login.php');