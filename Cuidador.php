<?php

require_once "BDD.php";

class Cuidador
{

//Função para verificar se existe id
public static function existeId($id)
{
    try {
        $conexao = Conexao::getConexao(); 
        $sql = $conexao->prepare("select count(*) from cuidador where id = ?");
        $sql->execute([$id]);

        $quantidade = $sql->fetchColumn();
        if ($quantidade > 0) {
            return true;
        } else {
            return false;
        }
    } catch (Exception $e) {
        echo $e->getMessage();
        exit;
    }
}

    public static function existe($email)
    {
        try {
            $conexao = Conexao::getConexao(); 
            $sql = $conexao->prepare("select count(*) from cuidador where email = ?");
            $sql->execute([$email]);

            $quantidade = $sql->fetchColumn();
            if ($quantidade > 0) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }


//Função para cadastrar Cuidador
    public static function cadastrar($nomeC, $email)
    {

        try {
            $conexao = Conexao::getConexao();
            $sql = $conexao->prepare("insert into cuidador(nome, email, data_cadastro) values (?,?, now())"); 
            $sql->execute([$nomeC, $email]); 

            if ($sql->rowCount() > 0) { 
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }

//Função que lista cuidadores
    public static function listar()
    {
        try {
            $conexao = Conexao::getConexao(); 
            $sql = $conexao->prepare("select * from cuidador order by id");
            $sql->execute();
            return $sql->fetchAll();
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public static function excluir_cuidador($id)
    {
        try{
            $conexao = Conexao::getConexao(); 
            $sql = $conexao->prepare("DELETE FROM cuidador where id = ?");
            $sql->execute([$id]);

            if($sql->rowCount()>0){
                return true;
            }else{
                return false;
            }
            
        }catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public static function nomeCuidador($idCuidador)
    {
        try {
            $conexao = Conexao::getConexao(); 
            $sql = $conexao->prepare("select nome from cuidador where id = ?");
            $sql->execute([$idCuidador]);

            return $sql->fetchAll();
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public static function editar_cuidador($nome, $email, $id)
    {
        //echo "id". ($id);
       // echo "<p>aqui</p>";
        try {
            $conexao = Conexao::getConexao();
            $sql = $conexao->prepare("UPDATE cuidador SET nome=?, email=?, data_cadastro= now() WHERE id=?");
            $sql->execute([$nome, $email, $id]);
    
            if ($sql->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public static function getCuidadorId($id)
    {
        try {
            $conexao = Conexao::getConexao();
            $sql = $conexao->prepare("SELECT * FROM cuidador WHERE id = ?");
            $sql->execute([$id]);

            return $sql->fetchAll()[0];
        } catch(Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }



    public static function existeEmail($email, $id)
    {
        try {
            $conexao = Conexao::getConexao(); 
            $sql = $conexao->prepare("select count(*) from cuidador where email = ? and id not in (?)");
            $sql->execute([$email, $id]);

            $quantidade = $sql->fetchColumn();
            if ($quantidade > 0) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }

}
?>