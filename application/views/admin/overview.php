<!-- Begin Page Content -->
        <div class="container-fluid">
        <?= $this->session->flashdata('message'); ?>

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
          <div class="card mb-3" style="max-width: 540px;">
			  <div class="row no-gutters">
			    <div class="col-md-4">
			      <img src="<?= base_url('asset/img/myprofil/') . $user['image']; ?>" class="card-img" alt="...">
			    </div>
			    <div class="col-md-8">
			      <div class="card-body">
			        <h5 class="card-title"><?= $user['name']; ?></h5>
			        <p class="card-text"><?= $user['email']; ?></p>
			        <p class="card-text"><small class="text-muted">Member since <?= date('d F Y', $user['date_created']); ?></small></p>
			      </div>
			    </div>
			  </div>
			</div>

			<div class="row">
			 <div class="card mb-3" style="max-width: 540px;">
			  <div class="row no-gutters">
			  	<?php 
			  		$sql = 'select * from berita order by berita_id desc limit 1';
			  		$berita = $this->db->query($sql)->result_array();
			  	 ?>
			  	<?php foreach ($berita as $b ) :?>
			    <div class="col-md-4">
			      <img src="<?= base_url('asset/img/news/') . $b['img_berita']; ?>" class="card-img" alt="...">
			    </div>
			    <div class="col-md-8">
			      <div class="card-body">
			      	<h5 class="card-title">News Update</h5>
			        <p class="card-text">Caption - <?= $b['caption']; ?></p>	        
			      </div>
			    </div>
			<?php endforeach; ?>			
			  </div>			  
			</div>			
			<div class="card mb-3" style="max-width: 540px;">
			  	<?php 
			  		$sql = 'select * from slider order by slider_id desc limit 1';
			  		$slide = $this->db->query($sql)->result_array();
			  	 ?>
			  	<?php foreach ($slide as $s ) :?>
			  <div class="row no-gutters">
			    <div class="col-md-4">
			      <img src="<?= base_url('asset/img/slider/') . $s['img_slider']; ?>" class="img-thumbnail" alt="...">
			    </div>
			    <div class="col-md-8">
			      <div class="card-body">
			        <h5 class="card-title">New Slide Update</h5>
			        <p class="card-text">Artis : <?= $s['name_image']; ?></p>        
			      </div>
			    </div>
			<?php endforeach; ?>			
			  </div>			  
			</div>

			</div>

        </div>
    </div>
        <!-- /.container-fluid -->