$(function() {
    $('.carousel').carousel({
        interval: 5000
    });

     $("#data").mask('99/99/9999');

    $(".deletar_func").click(function() {
	    var id = $(this).attr('rel');
	    if(confirm("Deseja deletar?"))
	        location.assign('admin.php?modulo=Noticias&acao=deletar&id='+id);
    });

    CKEDITOR.replace('conteudo');

});

