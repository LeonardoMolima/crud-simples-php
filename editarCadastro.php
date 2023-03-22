<?php

require "app/DB/Database.php";

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/navbar.php';

    if(isset($_POST['nome'],$_POST['email'],)){
        $id = $_POST['idCadastro'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];

        $objDatabase = new Database\Database();

        $pdo = $objDatabase->connection();

        $objDatabase->update($pdo,$id,$nome,$email);

        header('location: index.php?status=edited');
        exit;
    }

    if(isset($_POST['idCadastro'])){

        $id = $_POST['idCadastro'];

        $objDatabase = new Database\Database();

        $pdo = $objDatabase->connection();

        $fetchCad = $objDatabase->selectFiltro($pdo,$id);

        foreach($fetchCad as $valor){
        
        echo '
        <div class="container mt-4">
            <form method="POST" action="editarCadastro.php">
            <div class="mb-3">
                <input type="hidden" id="idCadastro" name="idCadastro" value='.$valor['id'].' />
                <label for="exampleInputEmail1" class="form-label" >Nome</label>
                <input type="text" class="form-control" name="nome" value='.$valor['nome'].'>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value='.$valor['email'].'>
            </div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Alterar</button>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmação</h1>
                    </div>
                    <div class="modal-body">
                        Você deseja salvar as alterações?
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                        <a href="index.php"> <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button> </a>
                    </div>
                    </div>
                </div>
            </div>

            </form>
        </div>
        ';
        
        }
    }


include __DIR__.'/includes/footer.php';

?>