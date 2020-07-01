  <!DOCTYPE html>
  <html>
    <head>
      <link rel="icon" type="image/png" href="<?php echo base_url() ?>asset/pro.png">
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>asset/css/materialize.min.css"  media="screen,projection"/>

      <!-- CSS den -->
      <link rel="stylesheet" href="<?php echo base_url() ?>asset/css/style.css">
      <link rel="stylesheet" href="<?php echo base_url() ?>asset/css/materialize.css">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

      <!-- icons -->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

      <!-- import icons -->
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

      <title>Home | Media Musik Proaktif</title>
    </head>

    <body>
      
      <?php 
      include ("sticsosmed.php");
      ?>
      

      <?php 
      include ("header.php");
      ?>

      <!-- slider -->
      <div class="slider">
        <ul class="slides">
          <?php 
              $sql = 'SELECT * FROM webmusik.slider where is_active = 1 ORDER BY slider_id DESC';
              $slider = $this->db->query($sql)->result_array();
          ?>
            <?php foreach ($slider as $s):?>
          <li>
            <img src="<?= base_url('asset/img/slider/') . $s['img_slider']; ?>">
          </li>
           <?php endforeach; ?>
          
        </ul>
      </div>

      
      <!-- about us -->
      <section id="about" class="about scrollspy">
        <div class="container">
          <div class="row">
            <div class="col m6 light">
              <h5 id="pro"><b>PT, MEDIA MUSIK PROAKTIF</b></h5>
              <p>PT. Media Musik Proaktif established in July 7, 2005 and founded by <b>Agi Sugiyanto.</b> As a record label and artist management company we are home for  several group, band and solo artist such as <b>T-Five, Trio Macan, Adista, Duo Amor, D’Mojang, Lsista and Elvira.</b> 
              Musik Proaktif also a place of hundreds content and partner. Truthfulness and reliability is our core value that we internalized to our partner, artist and employee.
              </p>
            </div>
            
            <h5 id="center"><b>Digital Platform</b></h5>
            <div id="ukuran" class="col m6 light">
              <img id="kecil" src="<?php echo base_url() ?>asset/img/logo/apple.png">
              <img id="kecil-dez" src="<?php echo base_url() ?>asset/img/logo/deezzer.png">
              <img id="kecil-jox" src="<?php echo base_url() ?>asset/img/logo/joox.png">
              <img id="kecil-pos" src="<?php echo base_url() ?>asset/img/logo/itunes.png">
            </div>
              <div id="ukuran"class="col m6 light">
              <img id="kecil-poss" src="<?php echo base_url() ?>asset/img/logo/spotify.png">
            </div>
            <div id="ukuran1"class="col m6 light">
              <img id="kecil-lm" src="<?php echo base_url() ?>asset/img/logo/lm.png">
              <img id="kecil-smart" src="<?php echo base_url() ?>asset/img/logo/smart.png">
            </div>
          
        </div>

      </section>

      <!-- Artis -->
        <div class="parallax-container scrollspy" id="artist">
          <div class="parallax"><img id="parallax1" src="<?php echo base_url() ?>asset/img/slider/4.jpg"></div>

          
            <div class="row">
              <div class="col m4 s12 center zoom">
              <a class="modal-trigger" href="#modal1"><img id="trio" src="<?php echo base_url() ?>asset/img/logo/3macan.png" ></a>
            </div>
            <div class="col m4 s12 center zoom">
              <a class="modal-trigger" href="#modal2"><img id="tfive" src="<?php echo base_url() ?>asset/img/logo/tfive.png"></a>
            </div>
            <div class="col m4 s12 center zoom">
              <a class="modal-trigger" href="#modal3""><img id="adist" src="<?php echo base_url() ?>asset/img/logo/adista.png"></a>
            </div>
            </div>
            <div class="row">
              <div class="col m4 s12 center zoom">
                <a class="modal-trigger" href="#modal4""><img id="duo" src="<?php echo base_url() ?>asset/img/logo/duoamor.png"></a>
              </div>
              <div class="col m4 s12 center zoom">
                <a class="modal-trigger" href="#modal5"><img id="lsista" src="<?php echo base_url() ?>asset/img/logo/lsista.png"></a>
              </div>
              
              <div class="col m4 s12 center zoom">
                <a class="modal-trigger" href="#modal6""><img id="dmojang" src="<?php echo base_url() ?>asset/img/logo/dmojang.png"></a>
              </div>
            </div>
            <div class="row">
              <div class="col s12 zoom">
                <a class="modal-trigger" href="#modal7""><img id="elvira" src="<?php echo base_url() ?>asset/img/logo/elvira.png"></a>
              </div>
            </div>
          </div>

          <div class="container">
            <div class="row baris1"> 
             <?php 
              $sql = 'SELECT * FROM webmusik.partner where is_active = 1 LIMIT 0, 6';
              $partner = $this->db->query($sql)->result_array();
              ?>
                <?php foreach ($partner as $p):?>        
              <div class="col m4 s12 zoom ukuran">
                <a href="<?= $p['url_yt']?>" target="_blank"><img src="<?= base_url('asset/img/partner/') . $p['img_partner']; ?>"></a>
              </div>
            <?php  endforeach; ?>              
            </div>        
          <p class="center-align row-divider"><a href="http://localhost/cpmusik/catalogue">More Partner</a></p>  
        </div>




        <!-- news -->
        <section id="news" class="news transparent scrollspy row-divider">
         <div id="berita" class="parallax-container">
          <div class="parallax">
          <img src="<?php echo base_url() ?>asset/img/slider/5.jpg"></div>
          <?php 
            $sql = 'SELECT * FROM webmusik.berita where is_active = 1';
            $berita = $this->db->query($sql)->result_array();
           ?>
           <?php foreach ($berita as $b):?> 
          
            <div class="mySlides fade center">
              <img src="<?= base_url('asset/img/news/') . $b['img_berita']; ?>">
              <div class="text"><?= $b['caption'] ?><a class="modal-trigger" href="<?= '#'. $b['berita_id'] ?>">Read More</a></div>
            </div>
            <?php  endforeach; ?>
           
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>      

        </section>

        <!-- contact us -->
        <section id="contact" class="contact scrollspy">
          <div class="container">
            <div class="row">
              <div class="col m5 s12">
                <div class="card-panel transparent darken-3 center black-text z-depth-5">
                  <i class="material-icons">contacts</i>
                  <h5>Contact</h5>
                  <div class="collection">
                    <a href="https://wa.me/62811127277?text=Halo%20Team%20Proaktif" class="collection-item" target="_blank">ARTIS MANJEMEN</a>
                    <p>Tel. 0811-1272-770</p>
                  </div>
                </div>
              <div class="collection with-header z-depth-5">
                <li class="collection-header">PT. MEDIA MUSIK PROAKTIF</li>
                <li>Ruko Grand Bintaro Blok C2</li>
                <li>Jl. Bintaro Permai Raya, Jakarta Selatan 12330</li>
                <li>Tel/Fax. +6221.73882318</li>
              </div>
              </div>

              <div class="col m7 s12">
              <form action="informasi" method="post">
                <div class="card-panel transparent z-depth-5">
                  <h3>Contact Us</h3>
                    <div class="input-field">
                    <input type="text" name="name" required class="validate">
                    <label for="name">Name</label>
                  </div>
                  <div class="input-field">
                    <input type="email" name="email" class="validate">
                    <label for="email">Email</label>
                  </div>
                  <div class="input-field">
                    <input type="text" name="phone" >
                    <label for="phone">Phone</label>
                  </div>
                  <div class="input-field">
                    <textarea name="message" class="materialize-textarea"></textarea>
                    <label for="message">Message</label>
                  </div>
                  <input type="submit" class="btn blue darken-3" name="submit" value="Send">
                </div>
              </form>
            </div>
            </div>            
          </div>
          
          <?php $this->load->view('kaki') ?>

        </section>

        <?php 
        $this->load->view('triomacan');
        $this->load->view('amor');
        $this->load->view('bandadista');
        $this->load->view('dmojang');
        $this->load->view('elvira');
        $this->load->view('lsista');
        $this->load->view('tfive');        
        $this->load->view('view_news');

        ?>

        <!-- kaki e -->
        
        





      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url() ?>asset/js/materialize.min.js"></script>
      

      <script>
          
         $('.zoom').hover(function() {
                $(this).addClass('transisi');
            }, function() {
                $(this).removeClass('transisi');
            });

        $(".button-collapse").sideNav();
        
        $('.slider').slider({
            indicators : true,
            height : 540,
            transition : 600,
            interval : 3000
          });
        
          $('.parallax').parallax();
              
        $('.carousel').carousel({
            fullWidth: true,
            width : 300
        });
        $('.carousel2').carousel();

        $('.scrollspy').scrollSpy({
          scrollOffset : 50
        });

        $(document).ready(function(){
            $('.modal').modal();              
          });
         

         
        
        

        $(document).ready(function() {
          <?php if (isset($post)): ?>
            var url2 = '#<?php echo $post ?>';
            // var url2 = '#about';
            $('.klik[href="'+url2+'"]').trigger('click');
            console.log('tet');
            console.log(url2);
          <?php endif ?>
         //$('.red-text[href="'+'#about'+'"]').trigger('click');
        });

        function findAndReplace(string, target, replacement) {
         
         var i = 0, length = string.length;
         
         for (i; i < length; i++) {
         
           string = string.replace(target, replacement);
         
         }
         
         return string;
         
        }

        //next
       /* var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
        showSlides(slideIndex += n);
        }
        function currentSlide(n) {
        showSlides(slideIndex = n);
        }
        function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
      }*/

      var slideIndex = 0;
      showSlides();

      function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}
        slides[slideIndex-1].style.display = "block";
        setTimeout(showSlides, 10000); // Change image every 2 seconds
      } 



       
      </script>
    </body>
  </html>
            