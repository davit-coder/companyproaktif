<!DOCTYPE html>
  <html>
    <head>
      <link rel="icon" type="image/png" href="<?php echo base_url() ?>asset/pro.png">
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="asset/css/materialize.min.css"  media="screen,projection"/>

      <!-- CSS den -->
      <link rel="stylesheet" href="asset/css/style.css">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

      <!-- icons -->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

      <!-- import icons -->
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

      <title>CATALOGUE LAGU | Media Musik Proaktif</title>
    </head>

    <body>
      <?php 
      include ("sticsosmed.php");
      ?>

      <?php 
      include ("header.php");
      ?>

      <section class="container">
      <ul class="collapsible warnalagu" data-collapsible="accordion">
        <?php 
          $sql = 'SELECT webmusik.song.*, webmusik.pencipta.nama_pencipta,
                  group_concat( ">", name_lagu separator "<br/>") as nama, COUNT(*) as total 
                  FROM webmusik.song JOIN webmusik.pencipta
                  ON webmusik.song.id_pencipta = webmusik.pencipta.id_pencipta                      
                  GROUP BY id_pencipta                                     
                  ';
          $list = $this->db->query($sql)->result_array();
          
         ?>
         <?php foreach ($list as $l):?>
         
        <li>
          <div class="collapsible-header">
            <i class="material-icons">account_circle</i>
            <?= $l['nama_pencipta']?>
            <span class="new badge" data-badge-caption="Song">
                <?= $l['total']?>
            </span>
          </div>            
          <div class="collapsible-body"><?= $l['nama']?></div>        
        </li>     
        <?php endforeach; ?>
      </ul>
      </section>




        <?php $this->load->view('kaki') ?>





      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="asset/js/materialize.min.js"></script>
      

      <script>
        $(".button-collapse").sideNav();

        $('.link').addClass('active');

        $('.slider').slider({
            indicators : false,
            height : 500,
            transition : 600,
            interval : 3000
          });
        
          $('.parallax').parallax();
              
        $('.carousel').carousel();

        $('.scrollspy').scrollSpy({
          scrollOffset : 50
        });

        $(document).off('click', '.klik').on('click', '.klik',function(e) {
            var ahref = $(this).attr('href');
            // var n = ahref.indexOf("#");
            // ahref = ahref.substring(0, n);
            console.log(ahref);
            ahref = findAndReplace(ahref,"#","");
            console.log(ahref);
            <?php if ($this->uri->segment(1) != 'home'): ?>
              var base_url_js = '<?php echo base_url() ?>';
              var url = base_url_js+'home';
             
              FormSubmitAuto(url, 'POST', [
                  { name: 'ahref', value: ahref },
              ]);
             
            <?php endif ?>
            
            //console.log('<?php echo base_url() ?>');
        });

        function FormSubmitAuto(action, method, values) {
            var form = $('<form/>', {
                action: action,
                method: method
            });
            $.each(values, function() {
                form.append($('<input/>', {
                    type: 'hidden',
                    name: this.name,
                    value: this.value
                }));    
            });
            form.attr('target');
            form.appendTo('body').submit();
        }

        function findAndReplace(string, target, replacement) {
         
         var i = 0, length = string.length;
         
         for (i; i < length; i++) {
         
           string = string.replace(target, replacement);
         
         }
         
         return string;
         
        }

      </script>
    </body>
  </html>