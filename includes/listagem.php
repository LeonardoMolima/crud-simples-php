<?php
require "app/DB/Database.php";

$objDatabase = new Database\Database();

$pdo = $objDatabase->connection();

$fetchCad = $objDatabase->select($pdo);

$cadastros = null;

foreach($fetchCad as $valor){
$cadastros .= '
    <tr>
        <td>'.$valor['id'].'</td>
        <td>'.$valor['nome'].'</td>
        <td>'.$valor['email'].'</td>
        <td>
            <form method="POST" action="/teste-crud/excluirCadastro.php">
                <input type="hidden" id="idCadastro" name="idCadastro" value='.$valor['id'].' />  
                <button class=" btn btn-danger ml-1">Excluir</button>
            </form>
        </td>
        <td>
            <form method="POST" action="/teste-crud/editarCadastro.php">
                <input type="hidden" id="idCadastro" name="idCadastro" value='.$valor['id'].' />    
                <button class=" btn btn-primary mr-1">Alterar</button>
            </form>
        </td>
    </tr>
    ';
}
    
?>

<main>
    


<section>
    <div class="container">

    <?php
    if(isset($_GET['status'])){
        $status = $_GET['status'];
        if($status == 'delete'){
            include 'messageDelete.php';
        }
        if($status == 'success'){
            include 'messageInsere.php';
        }
        if($status == 'edited'){
            include 'messageEdit.php';
        }
    }
    ?>

    <h1 class='mt-3'>Cadastros</h1>
        <table class="table table-hover mt-3">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Ações</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php echo $cadastros;?>
            </tbody>
        </table>
    </div>
</section>

</main>
