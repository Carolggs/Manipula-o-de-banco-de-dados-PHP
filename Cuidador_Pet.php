<?php

require_once "BDD.php";

class CuidadorPet
{

    //Função para verificar se existe id
public static function existeId($idCuidador, $idPet)
{
    try {
        $conexao = Conexao::getConexao(); 
        $sql = $conexao->prepare("select count(*) from cuidador_pet where id_cuidador = ? and id_pet =?");
        $sql->execute([$idCuidador, $idPet]);

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

    public static function cadastrarCP($idC, $idPP){
        

        try{
            $conexao =Conexao::getConexao();
            $sql= $conexao-> prepare("insert into cuidador_pet(id_cuidador, id_pet) values (?,?)"); 
            $sql->execute([$idC, $idPP]); 

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

    public static function listar()
    {
        try {
            $conexao = Conexao::getConexao(); 
            $sql = $conexao->prepare("select c.nome as nomeC, id_cuidador, p.nome as nomeP, id_pet from cuidador_pet cp, cuidador c, pet p  where id_cuidador=c.id and id_pet=p.id ");
            $sql->execute();
            return $sql->fetchAll();

        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public static function existePK($idC,$idPP)
{
    try {
        $conexao = Conexao::getConexao(); 
        $sql = $conexao->prepare("select count(*) from cuidador_pet where id_cuidador = ? and id_pet=?");
        $sql->execute([$idC, $idPP]);

        $quantidade = $sql->fetchColumn();
        if ($quantidade > 0) {
            return false;
        } else {
            return true;
        }
    } catch (Exception $e) {
        echo $e->getMessage();
        exit;
    }
}

public static function cuidador_Pet($idPet){
    try {
        $conexao = Conexao::getConexao(); 
        $sql = $conexao->prepare("select c.nome, c.id from cuidador c join cuidador_pet cp on c.id = cp.id_cuidador
        join pet p on p.id = cp.id_pet where id_pet=? order by nome");
        $sql->execute([$idPet]);


        return $sql->fetchAll();
    } catch (Exception $e) {
        echo $e->getMessage();
        exit;
    }
}

public static function pet_Cuidador($idCuidador){
    try {
        $conexao = Conexao::getConexao(); 
        $sql = $conexao->prepare("select p.nome, p.id from cuidador c join cuidador_pet cp on c.id = cp.id_cuidador
        join pet p on p.id = cp.id_pet where id_cuidador=? order by nome");
        $sql->execute([$idCuidador]);


        return $sql->fetchAll();
    } catch (Exception $e) {
        echo $e->getMessage();
        exit;
    }
}

public static function deletarRelacionamento($idCuidador, $idPet){
    try {
        $conexao = Conexao::getConexao(); 
        $sql = $conexao->prepare("delete from cuidador_pet where id_cuidador = ? and id_pet = ?");
        $sql->execute([$idCuidador, $idPet]);

        if($sql->rowCount() > 0){
            return true;
        } else {
            return false;
        }
    } catch (Exception $e) {
        echo $e->getMessage();
        exit;
    }
}

public static function deletar_id_pet($idPet){
    try {
        $conexao = Conexao::getConexao(); 
        $sql = $conexao->prepare("DELETE FROM cuidador_pet where id_pet = ?");
        $sql->execute([$idPet]);

        if($sql->rowCount() > 0){
            return true;
        } else {
            return false;
        }
    } catch (Exception $e) {
        echo $e->getMessage();
        exit;
    }
}

public static function deletar_id_cuidador($idCuidador){
    try {
        $conexao = Conexao::getConexao(); 
        $sql = $conexao->prepare("DELETE FROM cuidador_pet where id_cuidador = ?");
        $sql->execute([$idCuidador]);

        if($sql->rowCount() > 0){
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