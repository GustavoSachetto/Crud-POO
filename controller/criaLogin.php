<?php

require_once __DIR__.'/../model/classUsuario.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $values = [
        'email' => $_POST['email'],
        'senha' => $_POST['password']
    ];

    $result = Usuario::read("email = '".$values['email']."'");

    if ($result) {
        if (password_verify($values['senha'], $result['senha'])) {
            $_SESSION['usuario'] = $result;
        }
    }
}
