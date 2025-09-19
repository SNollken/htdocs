<?php

class UsuarioDAO{


private PDO $pdo;

    public function __construct() {
        $this->pdo = Conexao::getConexao();
    }

    public function readAll(): array {
        // Use o nome correto da tabela: 'usuario' ou 'usuarios'
        $sql = "SELECT id, nome, sobrenome, idade, sexo FROM usuario ORDER BY id DESC";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function createUsuario(Usuario $usuario)  {

        try{
            $sql = "INSERT INTO usuario(nome,sobrenome,idade,sexo)
                    VALUES(:nome,:sobrenome,:idade,:sexo)";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":nome", $usuario->getNome());
            $p_sql->bindValue(":sobrenome", $usuario->getSobrenome());
            $p_sql->bindValue(":idade", $usuario->getIdade());
            $p_sql->bindValue(":sexo", $usuario->getSexo());
            

            return $p_sql->execute();
            
        }catch(Exception $e){
            print "Erro ao inserir um usuário: <br>".$e.'<br>';
        }        
    }

    public function readUsuario()  {
        try{
            $sql = "select * from usuario order by asc";
            $result = Conexao::getConexao()->prepare($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach($lista as $l){
                $lista[]= $this->listaUsuarios($l);                
            } return $f_lista;

        }catch(Exception $e){
            print "Erro ao recuperar usuário: <br>".$e.'<br>';
        }        
    }

    private function listaUsuarios($row) {
        $usuario = new Usuario();
        $usuario->setId($row['id']);
        $usuario->setNome($row['nome']);
        $usuario->setSobrenome($row['sobrenome']);
        $usuario->setIdade($row['idade']);
        $usuario->setSexo($row['sexo']);

        return $usuario;
    }

    public static function updateUsuario(Usuario $usuario)  {

        try{
            $sql = "update usuario set
                nome = :nome,
                sobrenome = :sobrenome,
                idade = :idade,
                sexo = :sexo
                where id = :id";

            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":id", $usuario->getId());
            $p_sql->bindValue(":nome", $usuario->getNome());
            $p_sql->bindValue(":nome", $usuario->getNome());
            $p_sql->bindValue(":sobrenome", $usuario->getSobrenome());
            $p_sql->bindValue(":idade", $usuario->getIdade());
            $p_sql->bindValue(":sexo", $usuario->getSexo());
            

            return $p_sql->execute();
            
        }catch(Exception $e){
            print "Erro ao atualizar um usuário: <br>".$e.'<br>';
        }        
    }

    public function deleteUsuario(Usuario $usuario){

        try{
            $sql = "delete from usuario where id = :id";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":id", $usuario->getId());
            return $p_sql->execute();

        }catch(Exception $e){
            print "Erro ao deletar um usuário: <br>".$e.'<br>';
        }        

    }
}