<?php 
    if(!isset($_SESSION['user']['admin']))
        header("Location: admin.php");
?>
<div class="alert <?= isset($dados['alert']) ? $dados['alert'] : null ?>">
    <?= isset($dados['msg']) ? $dados['msg'] : null ?>
</div>
<script>
	setTimeout(function(){
		location.assign("admin.php?modulo=Noticias&acao=listagem");
	},500)
</script>
