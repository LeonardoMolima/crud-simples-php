<?php

namespace Database;

use \PDO;
use \PDOException;

class Database {

    private $host = 'localhost';
    private $dbname = 'basic_crud';
    private $user = 'root';
    private $password = '';

    public function connection(){
        try{
        $pdo = new PDO('mysql:host='.$this->host.';'.'dbname='.$this->dbname,$this->user,$this->password);
        return $pdo;
    }catch(PDOException $e){
            die('Erro: '.$e->getMessage());
        }
    }

    public function select($pdo){
        $sql = $pdo->query('SELECT * FROM cadastros');

        $fetchCadastros = $sql->fetchAll();

        return $fetchCadastros;
    }

    public function selectFiltro($pdo,$filtro){
        $sql = $pdo->query('SELECT * FROM cadastros WHERE id='.$filtro);

        $fetchCadastros = $sql->fetchAll();

        return $fetchCadastros;
    }

    public function insere($pdo, $nome, $email){
        try{
        $sql = $pdo->query("INSERT INTO cadastros(nome,email) VALUES ('$nome','$email');" );
        }catch(PDOException $e){
            die('Erro: '.$e->getMessage());
        }
    }

    public function update($pdo, $id, $nome, $email){
        try{
            var_dump(intval($id));
        $sql = $pdo->query("UPDATE cadastros SET nome='$nome',email='$email' WHERE id=".intval($id));
        }catch(PDOException $e){
            die('Erro: '.$e->getMessage());
        }
    }

    public function delete($pdo, $id){
        try{
            $sql = $pdo->query('DELETE FROM cadastros WHERE id ='.$id);
        }catch(PDOException $e){
            die('Erro: '.$e->getMessage());
        }
    }

}