 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          <?= form_error('nama_pencipta', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

          <?= $this->session->flashdata('message');?>

          

          <div class="row">
          	<div class="col-lg">
          		<?= form_open_multipart('pencipta'); ?>
          		<a href="" class="btn btn-primary mb-2 " data-toggle="modal" data-target="#newSliderModal">Add New Pencipta</a>
          		<a href="<?= base_url('uploadpencipta') ?>" class="btn btn-primary mb-2 ">Upload</a>
				
				<table class="table table-hover data">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      
				      <th scope="col">ID Pencipta</th>				     
				      <th scope="col">Nama Pencipta</th>				     
				      <th scope="col">Share</th>				     
				      <th scope="col">Action</th>				     
				    </tr>
				  </thead>
				  <tbody>
				  	<?php $i = 1; ?>
				  	<?php  foreach ($pencipta as $p) :?>
				    <tr>
				      <th scope="row"><?= $i; ?></th>				      
				      <td class="col-sm-2"><?= $p['id_pencipta']; ?></td>
				      <td class="col-sm-4"><?= $p['nama_pencipta']; ?></td>
				      <td class="col-sm-4"><?= $p['share']; ?></td>
				      <td>
				      	<a href="<?= base_url(); ?>penciptaedit?ID=<?= $p['id_pencipta']?>" class="badge badge-success">Edit</a>
				      	<a href="<?= base_url(); ?>hapuspencipta?ID=<?= $p['id_pencipta']?>" class="badge badge-danger tombol">Delete</a>

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
	        <h5 class="modal-title" id="newSliderModalLabel">Add New Pencipta</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <form action="<?= base_url('pencipta'); ?>" method="post">
	      <div class="modal-body">	        
			<div class="form-group">    
		    <input type="text" class="form-control mb-2" id="nama_pencipta" name="nama_pencipta" placeholder="Nama Pencipta">
			</div>
			<div class="form-group row ml-1">    
		    <input type="text" class="form-control mb-2 col-sm-4" id="share" name="share" placeholder="Share">%
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

	

 

