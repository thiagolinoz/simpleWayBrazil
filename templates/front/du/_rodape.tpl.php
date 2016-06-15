<?php use Model\Noticias;
      $noticia = new Noticias();
?>
<footer class="main-footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-md-4"> <img src="assets/images/content/icon_sw.png" alt="SW"> <br>
          <br>
          <p> Simple Way Brazilië is een Braziliaans bedrijf handelt internationaal, gericht op commerciële vertegenwoordiging en dienstverlening aan buitenlandse bedrijven</p>
          <p> Rua dos Caciques, 273 – casa 4.<br> Vila da Saúde - São Paulo/SP - Brazil<br>Postcode: 04145-000
            <span class="footer-contacts"> <i class="fa fa-fw fa-phone"></i> +55 (11) 5589 4484<br>
            <i class="fa fa-fw fa-phone "></i> +55 (11) 95356 5510<br>
            <i class="fa fa-fw fa-envelope "></i> <a href="mailto:info@simplewaybrazil.com">info@simplewaybrazil.com</a> </span> </p>
        </div>
        <div class="col-sm-6 col-md-4">
          <h4 class="uppercase">NIEUWS</h4>
          <div class="widget">
            <div class="widget-inner">
              <ul>
                <?php foreach($noticia->listar("",4,"id") as $k => $v):
                  $i= 0;
                ?>  
                  <li class="cat-item cat-item-1"> <a href="index.php?modulo=Noticias&acao=exibir&id=<?=$v->id?>" title=""><?= $v->titulo?></a> </li>
                <?php 
                  $i++;
                  endforeach;
                ?>
              </ul>
            </div>
          </div>
        </div>
        <div class="clearfix visible-sm"></div>
        <div class="col-sm-6 col-md-4">
          <h4 class="uppercase">AANGEBODEN DIENSTEN</h4>
          
         
         
          <div class="widget">
            <div class="widget-inner">
              <div class="tagcloud"> 
              <a href="servico_pesquisa">Marktonderzoek</a> 
              <a href="servico_marketing">Marketing, verkoop en business development</a> 
              <a href="servico_feiras">Tentoonstellingen, missies en zakelijke bijeenkomsten</a> 
              <a href="servico_relacoes">Publieke Relaties (PR)</a> 
              <a href="servico_sociais">Social media</a>
              <a href="servico_publicidade">Media en reclame</a> 
              <a href="servico_posvenda">Klantenservice en pre en after sales management</a> 
              <a href="servico_traducoes">Vertaling</a> </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
    <span id="backtoTop"><i class="fa fa-fw fa-angle-double-up"></i></span> </footer>
  <div class="container"></div>
  <div class="post-footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-12"> Copyright 2015 © Simple Way Brazil. All rights reserved - <a href="#" target="_blank"></a> </div>
       
      </div>
    </div>
  </div>
</div>

<!-- scripts bellow --> 

<script src="assets/js/jquery.min.js"></script> 
<script src="assets/bootstrap/js/bootstrap.min.js"></script> 
<script src="assets/js/jquery.easing.1.3.js"></script> 
<!-- IE --> 
<script src="assets/js/modernizr.custom.js"></script> 

<!-- JS responsible for hover in touch devices --> 
<script src="assets/js/jquery.hoverIntent.js"></script> 

<!-- Detects when a element is on wiewport --> 
<script src="assets/js/jquery.appear.js"></script> 

<!-- Fits Videos to container --> 
<script src="assets/js/jquery.fitvids.js"></script> 

<!-- Count to plugin --> 
<script src="assets/js/jquery.countTo.js"></script> 

<!-- Revolution Slider --> 
<script src="assets/plugins/revslider/js/jquery.themepunch.revolution.min.js"></script> 
<script src="assets/plugins/revslider/js/jquery.themepunch.plugins.min.js"></script> 

<!-- Flexslider --> 
<script src="assets/plugins/flexslider/jquery.flexslider-min.js"></script> 

<!-- Thumb slider with mouse hover navigation --> 
<script src="assets/plugins/thumbscroller/jquery-ui-1.8.13.custom.min.js"></script> 
<script src="assets/plugins/thumbscroller/jquery.thumbnailScroller.js"></script> 

<!-- magnific popup --> 
<script src="assets/plugins/magnificpopup/jquery.magnific-popup.min.js"></script> 

<!-- Responsible for the sidebar navigation in mobile --> 
<script src="assets/js/snap.min.js"></script> 

<!-- Twitter --> 
<script src="assets/twitter/js/jquery.tweet.js"></script> 

<!-- Contact form validation --> 
<script src="assets/form/js/contact-form.js"></script> 

<!-- our main JS file --> 
<script src="assets/js/main.js"></script> 

<!-- end scripts -->
</body>
</html>