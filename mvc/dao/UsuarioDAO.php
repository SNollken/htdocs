<?php

class UsuarioDAO{

    public static function createUsuario(Usuario $usuario){
        // Lógica para criar um novo usuário no banco de dados

        try{
            $sql = "INSERT INTO usuarios (nome, sobrenome, idade, sexo)
            values (:nome, :sobrenome, :idade, :sexo)";

            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":nome", $usuario->getNome());
            $p_sql->bindValue(":sobrenome", $usuario->getSobrenome());
            $p_sql->bindValue(":idade", $usuario->getIdade());
            $p_sql->bindValue(":sexo", $usuario->getSexo());

            return $p_sql->execute();
        }catch(Exception $e){
            print "Erro ao criar usuário  <br>" . $e.'<br>';
        }
    }

    public function readUsuario(){
        // Lógica para ler um usuário do banco de dados
        try{

            $sql = "select * from usuarios order by nome asc";
            $result = Conexao::getConexao()->prepare($sql);
            $lista = $result ->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach($lista as $l){
                $f_lista[] = $this -> listaUsuario($l);
            }

    }catch(Exception $e){
            print "Erro ao ler usuário  <br>" . $e.'<br>';
        }
    }

}