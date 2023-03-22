<?php

require "app/DB/Database.php";

    if(isset($_POST['nome'],$_POST['email'],)){
        $nome = $_POST['nome'];
        $email = $_POST['email'];

        $objDatabase = new Database\Database();

        $pdo = $objDatabase->connection();
        $objDatabase->insere($pdo,$nome,$email);

        header('location: index.php?status=success');
        exit;
    }

    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/navbar.php';
    include __DIR__.'/includes/formulario.php';

    if(isset($_GET['status'])=='success'){
        include __DIR__.'/includes/messege.php';
        exit;
    }

    include __DIR__.'/includes/footer.php';

?>
    


