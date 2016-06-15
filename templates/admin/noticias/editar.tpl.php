<?php 
    if(!isset($_SESSION['user']['admin']))
        header("Location: admin.php");
?>

<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
    <fieldset>

        <!-- Form Name -->
        <legend>Edição de noticia</legend>
    
        <div class="control-group">
            <label class="control-label">Titulo:</label>
            <div class="controls">
                <input name="titulo" value="<?= $dados->titulo?>" class="input-xlarge" type="text">
            </div>
        </div>
            
        <div class="control-group">
            <label class="control-label">Sub titulo:</label>
            <div class="controls">
                <input name="sub_titulo" value="<?= $dados->sub_titulo?>" class="input-xlarge" type="text">
            </div>
        </div>
            
        <div class="control-group">
            <label class="control-label">Conteudo:</label>
            <div class="controls">
                <textarea name="conteudo" class="input-xlarge" type="text" rows="10" cols="80"><?= $dados->conteudo?></textarea>
            </div>
        </div>
            
        <div class="control-group">
            <label class="control-label">Imagem:</label>
            <div class="controls">
                <input name="imagem" value="" class="input-xlarge" type="file">
            </div>
        </div>

        <?php if($dados->imagem):?>
        <div class="control-group">
            <label class="control-label"></label>
            <div class="controls">
                <img src="public/img/<?= $dados->imagem ?>" width="150" height="150"/>
            </div>
        </div>
        <?php endif; ?>

        <div class="control-group">
            <label class="control-label">Data da noticia:</label>
            <div class="controls">
                <input name="data_noticia" value="<?= $dados->data_noticia?>" id="data"class="input-xlarge" type="text">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Ativo:</label>
            <div class="controls">
                <select name="ativo">
                    <option value="1" <?php if($dados->ativo == 1) echo "selected"?>>Sim</option>
                    <option value="0" <?php if($dados->ativo == 0) echo "selected"?>>Não</option>
                </select>    
            </div>
        </div>
        
        <div class="control-group">
            <label class="control-label"></label>
            <div class="controls">
                <button class="btn btn-primary">Cadastrar</button>
            </div>
        </div>
        
        <div class="control-group">
            <label class="control-label"></label>
            <div class="controls">
                <a href="admin.php?modulo=Noticias&acao=listagem">Voltar para Listagem</button>
            </div>
        </div>
    
    </fieldset>
</form>

