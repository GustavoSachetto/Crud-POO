<?php

require '../../model/classFuncionario.php';
include 'ImageManager.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $value = Funcionario::read('funcional = '.$_SESSION['usuario']['funcional']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $values = [
        'cpf'             => $_POST['cpf'],
        'nome'            => $_POST['nome'],
        'telefone'        => $_POST['telefone'],
        'endereco'        => $_POST['endereco'],
        'codDepartamento' => $_POST['codDepartamento'],
        'codCargo'        => $_POST['codCargo'],
        'updated_at'      => $_POST['datetime'],
        'image_url' =>    !empty($_FILES['image_url']['name']) 
            ? ImageManager::save("view/img/funcionario", $_FILES['image_url']) 
            : Funcionario::read('funcional = '.$_SESSION['usuario']['funcional'])[0]['image_url'] 
    ];
    
    $result = Funcionario::update('funcional = '.$_SESSION['usuario']['funcional'], $values);
    $value = Funcionario::read('funcional = '.$_SESSION['usuario']['funcional']);
}