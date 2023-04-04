<?php

require_once "BDD.php";

class Pet{

    //Função para cadastrar Pet
    public static function cadastrar($name, $descricao, $telefone){


        try{
            $conexao =Conexao::getConexao();
            $sql= $conexao -> prepare("insert into pet(nome, descricao, tel_tutor, data_cadastro) values (?,?,?, now())"); 
            $sql->execute([$name, $descricao, $telefone]); 

            if($sql->rowCount()>0){  
                return true;
            }else{
                return false;
            }
            

        }catch(Exception $e){
            echo $e->getMessage();
            exit;
        }
    }

    //Função para listar pet
    public static function listar()
    {
        try {
            $conexao = Conexao::getConexao(); 
            $sql = $conexao->prepare("select * from pet order by id");
            $sql->execute();
            return $sql->fetchAll();

        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }
    
    public static function existePet($nome, $telefone)
    {
        try {
            $conexao = Conexao::getConexao(); 
            $sql = $conexao->prepare("select count(*) from pet where nome = ? and tel_tutor=? ");
            $sql->execute([$nome, $telefone]);

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

    

    public static function nomePet($idPet)
    {
        try {
            $conexao = Conexao::getConexao(); 
            $sql = $conexao->prepare("select nome from pet where id = ?");
            $sql->execute([$idPet]);
            return $sql->fetchAll();
            
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public static function excluir_pet($id)
    {
        try{
            $conexao = Conexao::getConexao(); 
            $sql = $conexao->prepare("DELETE FROM pet where id = ?");
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
    public static function editar_pet($nome, $descricao, $tel_tutor, $id)
    {
        //echo ($id);
        try {
            $conexao = Conexao::getConexao();
            $sql = $conexao->prepare("UPDATE pet SET nome=?, descricao=?, tel_tutor=?, data_cadastro= now() WHERE id=?");
            $sql->execute([$nome, $descricao, $tel_tutor, $id]);

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
    public static function getPetId($id)
    {
        //echo ($id);
        try {
            $conexao = Conexao::getConexao();
            $sql = $conexao->prepare("SELECT * FROM pet WHERE id = ?");
            $sql->execute([$id]);

            return $sql->fetchAll()[0];
        } catch(Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }
    public static function existeId($id)
        {
            //echo ($id);
            try {
                $conexao = Conexao::getConexao();
                $sql = $conexao->prepare("SELECT COUNT(*) FROM pet WHERE id = ?");
                $sql->execute([$id]);

                $quantidade = $sql->fetchColumn();
                if ($quantidade > 0) {
                    return true;
                } else {
                    return false;
                }
            } catch(Exception $e) {
                echo $e->getMessage();
                exit;
            }
        }
        public static function listarPetDono($tel){
            try {
                $conexao = Conexao::getConexao(); 
                $sql = $conexao->prepare("select * from pet where tel_tutor=? ");
                $sql->execute([$tel]);
                
                return $sql->fetchAll();
    
            } catch (Exception $e) {
                echo $e->getMessage();
                exit;
            }
        }

        public static function listarTelefone()
        {
            try {
                $conexao = Conexao::getConexao(); 
                $sql = $conexao->prepare("select distinct tel_tutor from pet");
                $sql->execute();
                return $sql->fetchAll();
    
            } catch (Exception $e) {
                echo $e->getMessage();
                exit;
            }
        }
    }

 


?>