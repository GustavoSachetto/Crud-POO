<?php 

include_once __DIR__.'/../../config/define.php';

unset($_SESSION['usuario']);

header('Location: '. URL .'/view/page/login.php');