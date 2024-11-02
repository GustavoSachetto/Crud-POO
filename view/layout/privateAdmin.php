<?php

if (!isset($_SESSION["usuario"]) or empty($_SESSION["usuario"])) {
    header('Location: '.URL.'/view/page/login.php');
} else if (boolval($_SESSION["usuario"]["status"]) == false) {
    header('Location: '.URL);
}

?>