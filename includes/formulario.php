<div class="container mt-4">
<h1 class='mt-3'>Inserir novo Cadastro</h1>
        <form method="POST">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label" >Nome</label>
            <input type="text" class="form-control" name="nome">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Email</label>
            <input type="email" class="form-control" name="email">
        </div>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Criar</button>

        <?php include 'modal.php'; ?>

        </form>
</div>
