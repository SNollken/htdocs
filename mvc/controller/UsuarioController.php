<?php

require_once __DIR__ .'/../conexao/Conexao.php';
require_once __DIR__ .'/../model/Usuario.php';
require_once __DIR__ .'/../dao/UsuarioDAO.php';

class UsuarioController{
    public function index(){
        $dao = new UsuarioDAO();
        $usuarios = $dao->readAll();
        require_once __DIR__.'/../view/home.php';
    }

    public function cadastrar(){
        $d = filter_input_array(INPUT_POST);
        if(isset($d['cadastrar'])){
            $usuario = new Usuario();
            $dao = new UsuarioDAO();

            $usuario->setNome($d['nome']);
            $usuario->setSobrenome($d['sobrenome']);
            $usuario->setIdade($d['idade']);
            $usuario->setSexo($d['sexo']);

            $dao->createUsuario($usuario);

            header("Location: ".dirname($_SERVER['SCRIPT_NAME'])
                ."/index.php?action=index");
            
    }error_log(("Não foi possível cadastrar;"));
    }

    public function editar(): void{
        $d = filter_input_array(INPUT_POST);
        if(isset($d['editar'])){
            $usuario = new Usuario();
            $dao = new UsuarioDAO();

            $usuario->setId($d['id']);
            $usuario->setNome($d['nome']);
            $usuario->setSobrenome($d['sobrenome']);
            $usuario->setIdade($d['idade']);
            $usuario->setSexo($d['sexo']);

            $dao->updateUsuario($usuario);

            header("Location: ".dirname($_SERVER['SCRIPT_NAME'])
                ."/index.php?action=index");
            
    }error_log(("Não foi possível editar;"));
    }

    public function deletar():void {
                $d = filter_input_array(INPUT_POST);
        if(isset($d['deletar'])){
            $usuario = new Usuario();
            $dao = new UsuarioDAO();

            $usuario->setId($d['id']);

            $dao->deleteUsuario($usuario);

            header("Location: ".dirname($_SERVER['SCRIPT_NAME'])
                ."/index.php?action=index");
            
    }error_log(("Não foi possível editar;"));
    }
}