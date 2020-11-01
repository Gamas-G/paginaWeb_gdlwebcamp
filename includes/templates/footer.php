<footer class="site-footer">
    <div class="contenedor clearfix">
      <div class="footer-informacion">
        <h3>Sobre <span>gdlwebcamp</span></h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque, labore ipsum? Ipsa, sit! Impedit nihil itaque doloribus iusto similique at eveniet neque dolores tempora ab, laudantium culpa, quibusdam autem architecto.</p>
      </div>
      <div class="ultimos-tweets">
        <h3>Últimos <span>tweets</span></h3>
        <ul>
          <li>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aut sint magnam dolorum iure, temporibus eveniet veniam, architecto perferendis asperiores.</li>
          <li>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aut sint magnam dolorum iure, temporibus eveniet veniam, architecto perferendis asperiores.</li>
          <li>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aut sint magnam dolorum iure, temporibus eveniet veniam, architecto perferendis asperiores.</li>
        </ul>
      </div>
      <div class="menu">
        <h3>Redes <span>sociales</span></h3>
        <nav class="redes-sociales">
          <a href="#"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
          <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
          <a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
          <a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
          <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
        </nav>
      </div>
    </div>
    <p class="copyright">Todos los derechos Reservados GDLWEBCAMP 2020.</p>
  </footer>
  
  
  
  <script src="js/vendor/modernizr-3.11.2.min.js"></script>
  <script src="js/jquery.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script><!--Plugin para animar numero con jQuery-->
  <script src="js/jquery.countdown.min.js"></script><!--Plugin que te nos otroga una cuenta regresiva-->
  <script src="js/jquery.lettering.js"></script><!--Este plugin nos ayuda crear diseños de tipografia, añadir diseños moviminetos a nuestrar letras-->
  <?php 
    $archivo = basename($_SERVER['PHP_SELF']);
    $pagina = str_replace(".php", "", $archivo);
    if($pagina == 'invitados' || $pagina == 'index'){
      echo('<script src="js/jquery.colorbox-min.js"></script>');
    }else if($pagina == 'conferencia'){
      echo('<script src="js/lightbox.js"></script>');
    }
  ?>
  <!-- <script src="js/lightbox.js"></script> -->
  <!-- <script src="js/jquery.colorbox-min.js"></script> -->
  <script src="js/main.js"></script>


  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set', 'anonymizeIp', true); ga('set', 'transport', 'beacon'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async></script>
</body>

</html>