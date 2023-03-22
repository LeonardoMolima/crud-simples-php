<?php

require "app/DB/Database.php";

    if(isset($_POST['idCadastro'])){
        $id = $_POST['idCadastro'];

        $objDatabase = new Database\Database();

        $pdo = $objDatabase->connection();
        $objDatabase->delete($pdo,$id);

        header('location: index.php?status=delete');
        exit;
    }

?>