<?php

require_once __DIR__ .'/conexao/Conexao.php';
require_once __DIR__ .'/model/Usuario.php';
require_once __DIR__ .'/dao/UsuarioDAO.php';
require_once __DIR__ .'/controller/UsuarioController.php';


$action = $_GET['action']??'index';
$ctrl = new UsuarioController();

switch($action){
    case 'cadastrar': $ctrl->cadastrar();break;
    case 'editar': $ctrl->editar();break;
    case 'deletar': $ctrl->deletar();break;
    default: $ctrl->index();break;
}