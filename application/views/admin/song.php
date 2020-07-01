 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          <?= form_error('name_lagu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

          <?= $this->session->flashdata('message');?>

          

          <div class="row">
          	<div class="col-lg">
          		<a href="" class="btn btn-primary mb-2" data-toggle="modal" data-target="#newSliderModal">Add New Song</a>

          		<div class="input-group ">
			<div class="custom-file col-sm-4">
			<form action="<?= base_url('admin/song/upload') ?>" method="post" enctype="multipart/form-data">				  	
				<input type="file" name="excelfile" class="custom-file-input"  />
				<label class="custom-file-label" for="excelfile">Choose file</label>
				</div>
				<div class="input-group-append">
				<button class="btn btn-outline-secondary" type="submit" >Upload</button>
				</div>
			</div>
		</form>
          		<?= form_open_multipart('song'); ?>

          		<table class="table table-hover data">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      
				      <th scope="col">Nama Pencipta</th>				     
				      <th scope="col">Judul Lagu</th>				     
				      <th scope="col">Genre</th>				     
				      <th scope="col">Action</th>				     
				    </tr>
				  </thead>
				  <tbody>
				  	<?php $i = 1; ?>
				  	<?php  foreach ($song as $s) :?>
				    <tr>
				      <th scope="row"><?= $i; ?></th>				      
				      <td class="col-sm-2"><?= $s['nama_pencipta']; ?></td>
				      <td class="col-sm-4"><?= $s['name_lagu']; ?></td>
				      <td class="col-sm-4"><?= $s['genre']; ?></td>
				      <td>
				      	<a href="<?= base_url(); ?>songedit?ID=<?= $s['id_song']?>" class="badge badge-success">Edit</a>
				      	<a href="<?= base_url(); ?>hapuslagu?ID=<?= $s['id_song']?>" class="badge badge-danger tombol">Delete</a>

				      </td>
				    </tr>
				    <?php $i++; ?>
					<?php endforeach; ?>
				    
				  </tbody>
				</table>
          	</div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Button trigger modal -->


	<!-- Modal -->
	<div class="modal fade" id="newSliderModal" tabindex="-1" role="dialog" aria-labelledby="newSliderModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="newSliderModalLabel">Add New Song</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <form action="<?= base_url('song'); ?>" method="post">
	      <div class="modal-body">	        
			<div class="form-group">    
		    <select name="id_pencipta" id="id_pencipta" class="form-control">
		    	<option value="">Select Pencipta</option>
		    	<?php foreach ($pencipta as $p ) : ?>
		    		<option value="<?= $p['id_pencipta'] ?>"><?= $p['nama_pencipta'] ?></option>
		    	<?php endforeach; ?>
		    </select>
			</div>
			<div class="form-group">    
		    <input type="text" class="form-control mb-2" id="name_lagu" name="name_lagu" placeholder="Judul Lagu">
			</div>
			<div class="form-group">    
		    <input type="text" class="form-control mb-2" id="genre" name="genre" placeholder="Genre">
			</div>
		    <div class="form-check">
				<input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
				<label class="form-check-label" for="is_active">
			    Active?
			</label>
		  </div>
	      </div>
	
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Add</button>
	      </div>
	      </form>
	    </div>
	  </div>
	</div>

	

 

