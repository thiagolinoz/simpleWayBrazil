<?php use Model\Noticias;
      $noticia = new Noticias();
?>
<!--  StartTopo  -->
<div class="container"></div>

<div class="container"></div>
<div id="wrapper"> 
  
  <!-- VISIBLE COPY OF THE HEADER ONLY IN MOBILE NEEDED FOR THE SIDE MENU EFFECT -->
  
  <div class="container"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header visible-xs"> <a class="navbar-brand" href="index.php"><img src="assets/images/content/logo.png" alt="Corpress Logo"/></a>
      <button type="button" class="navbar-toggle" id="sidebar-toggle"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a href="#" class="showHeaderSearch"><i class="fa fa-fw fa-search"></i></a> </div>
  </div>
  

  <div class="container"></div>
    <div class="container"></div>
  <div class="container"></div>
  <!--Conteúdo do Site-->
<section class="media-section darkbg" data-height="220" data-type="kenburns">
    <div class="media-section-image-container">
        <img src="assets/images/content/parallax_noti.jpg" alt="demo image">
    </div>

    <div class="inner">
        <div class="text-center">
            <h2 class="uppercase page-header no-margin">NIEUWS</h2>
        </div>
    </div>
</section>

<div class="container"></div>

<section class="container section">
    <div class="row">
        <div class="col-sm-12 col-md-12">
             <div class="row" id="novas_noticias">
             <?php foreach($noticia->listar("","2","id") as $v) : ?>
                <div class="col-sm-12 post">
                    <article class="journal">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="media-object">
                                    <a href="index.php?modulo=Noticias&acao=exibir&id=<?=$v->id?>"><img src="public/img/<?=$v->imagem?>" alt="Journal Image"/></a>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <h4 class="uppercase"><a href="index.php?modulo=Noticias&acao=exibir&id=<?=$v->id?>"><?= $v->titulo?></a></h4>
                                <span class="meta">
                                    <span class="meta-single">
                                        <i class="fa fa-calendar white"></i> <?= $v->data_noticia?>
                                    </span>
                                </span>
                                <p>
                                    <?= $v->sub_titulo?>     
                                </p>
                                <a href="index.php?modulo=Noticias&acao=exibir&id=<?=$v->id?>" class="btn btn-lg btn-border">More</a>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </article>
                    <hr>
                </div>
                <?php endforeach; ?>
            </div>
            <div id="botao_mais">
                <a href="javascript:void(0)" class="btn btn-lg btn-border" id="mais_noticias">More News</a>        
            </div>
        </div>
        
    </div>
</section>


<div class="container"></div>

<!--  Start Rodapé  -->
<script>
    $(document).ready(function(){
        var total_noticias = <?= count($noticia->listar());?>;
        var n_class = 2;
        $("#mais_noticias").click(function(){
            $.ajax({
                method: "POST",
                data: {start: n_class, 
                       limit: 2
                      },
                url: "index.php?modulo=Noticias&acao=listaMais",
                dataType: "json",
            }).done(function(data){
                for(var i in data){
                    $('#novas_noticias').append('<div class="col-sm-12 post"> <article class="journal"> <div class="row"> <div class="col-md-5"> <div class="media-object"> <a href="index.php?modulo=Noticias&acao=exibir&id='+data[i]._id+'"><img src="public/img/'+data[i].imagem+'" alt="Journal Image"/></a> </div></div><div class="col-md-7"> <h4 class="uppercase"><a href="index.php?modulo=Noticias&acao=exibir&id='+data[i]._id+'">'+data[i].titulo+'</a></h4> <span class="meta"> <span class="meta-single"> <i class="fa fa-calendar white"></i> '+data[i].data_noticia+' </span> </span> <p> '+data[i].sub_titulo+' </p><a href="index.php?modulo=Noticias&acao=exibir&id='+data[i]._id+'" class="btn btn-lg btn-border">Leia Mais</a> </div></div><div class="clearfix"></div></article> <hr> </div>');
                }
                var n_class_done = $('.post').length;
                if(total_noticias == n_class_done){
                    $("#botao_mais").hide();
                }
                n_class += 2; 
            });
        });
    });    
</script>
