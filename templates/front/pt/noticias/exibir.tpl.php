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
    <div class="navbar-header visible-xs"> <a class="navbar-brand" href="index.html"><img src="assets/images/content/logo.png" alt="Corpress Logo"/></a>
      <button type="button" class="navbar-toggle" id="sidebar-toggle"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a href="#" class="showHeaderSearch"><i class="fa fa-fw fa-search"></i></a> </div>
  </div>
  

  <div class="container"></div>
    <div class="container"></div>
  <div class="container"></div>
  <!--Conteúdo do Site-->


<div class="container"></div>

<section class="container section">
    <div class="row">
        <div class="col-sm-8 col-md-9">
            <h2 class="hidden">Our Journal</h2>
            <div class="row">
            
                <div class="col-sm-12 post">
                    <article class="journal">
                        <div class="media-object">
                        <br>
                            <a href="blog-single.html"><img src="public/img/<?=$dados->imagem?>" alt="Journal Image"/></a>
                        </div>
                        <div class="clearfix"></div>
                        <h4 class="uppercase"><a href=""><?= $dados->titulo ?></a></h4>
                        <span class="meta">
                            <span class="meta-single">
                                <i class="fa fa-calendar"></i> <?= $dados->data_noticia ?>
                            </span>
                            
                        </span>
                        <?= $dados->conteudo ?>    
                    </article>
                 
                </div>
            </div>
        </div>
        <div class="col-sm-4 col-md-3 sidebar">
            <div class="row">
                
                <div class="col-sm-12">
                    <h4 class="uppercase">Últimas Notícias</h4>
                    <div class="widget">
                        <div class="widget-inner">
                            <ul>
                                <?php foreach($noticia->listar("",4) as $v): ?>
                                    <li>
                                        <a href="index.php?modulo=Noticias&acao=exibir&id=<?=$v->id?>" title=""><?= $v->titulo?></a>
                                    </li>
                                <?php endforeach; ?>    
                            </ul>
                        </div>
                    </div>
                </div>
                
                
                
                
            </div>
        </div>
    </div>
</section>


<div class="container"></div>

<!--  Start Rodapé  -->
