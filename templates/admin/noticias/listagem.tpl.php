<?php 
    if(!isset($_SESSION['user']['admin']))
        header("Location: admin.php");
?>
<div class="alert <?= isset($dados['alert']) ? $dados['alert'] : null ?>">
    <?= isset($dados['msg']) ? $dados['msg'] : null ?>
</div>
<form class="form-horizontal">
    <fieldset>

        <!-- Form Name -->
        <div>
            <a href="?modulo=Noticias&acao=logout">Logout</a>    
        </div>
        <legend>Listagem de Noticias</legend>
        <div class="well">
            <table class="table">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Data Noticia</th>
                        <th>Ativo</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php foreach($dados as $valor): ?>
                        <tr>
                            <td><?= $valor->titulo ?></td>
                            <td><?= $valor->data_noticia ?></td>
                            <td><?= $valor->ativo == 1 ? "Sim" : "Não" ?></td>
                            <td><a href="admin.php?modulo=Noticias&acao=editar&id=<?=$valor->id?>"><img src="public/img/edit.jpg"></a>
                                <a href="javascript:void(0)" class="deletar_func" rel="<?=$valor->id?>"><img src="public/img/delete.jpg"></a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
        <div>
            <a href="admin.php?modulo=Noticias&acao=cadastro">CADSTRAR NOVO</a>
        </div>
    </fieldset>
</form>
