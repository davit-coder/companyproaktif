 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          <?= form_error('url_yt', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

          <?= $this->session->flashdata('message');?>

          

          <div class="row">
          	<div class="col-lg">
          		<?= form_open_multipart('partner'); ?>
          		<a href="" class="btn btn-primary mb-2" data-toggle="modal" data-target="#newSliderModal">Add New Partner</a>
          		<table class="table table-hover">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      
				      <th scope="col">Image</th>				     
				      <th scope="col">Link Youtube</th>				     
				      <th scope="col">Action</th>				     
				    </tr>
				  </thead>
				  <tbody>
				  	<?php $i = 1; ?>
				  	<?php  foreach ($partner as $p) :?>
				    <tr>
				      <th scope="row"><?= $i; ?></th>
				      
				      <td class="col-sm-4"><img src="<?= base_url('asset/img/partner/') . $p['img_partner']; ?>" class="img-thumbnail"></td>
				      <td class="col-sm-4"><?= $p['url_yt']; ?></td>
				      <td>
				      	<a href="<?= base_url(); ?>partneredit?ID=<?= $p['partner_id']?>" class="badge badge-success">Edit</a>
				      	<a href="<?= base_url(); ?>partnerhapus?ID=<?= $p['partner_id']?>" class="badge badge-danger tombol">Delete</a>

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
	        <h5 class="modal-title" id="newSliderModalLabel">Add New Slider</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <form action="<?= base_url('partner'); ?>" method="post">
	      <div class="modal-body">
	        <div class="form-group">    
		    <input type="text" class="form-control mb-2" id="url_yt" name="url_yt" placeholder="Link Youtube">
		    <div class="form-group row">
		    <div class="col-sm-2">Picture</div>
		    <div class="col-sm-10">
		    	<div class="row">
		    		<div class="col-sm-3">
		    			<img src="<?= base_url('asset/img/slider/defaultSlider.jpg'); ?>" class="img-thumbnail">
		    		</div>
		    		<div class="col-sm-9">
		    			<div class="custom-file">
					  <input type="file" class="custom-file-input" id="image" name="image">
					  <label class="custom-file-label" for="image">Choose file</label>
					</div>
		    		</div>		    		
		    </div>
		    </div>
		    </div>		    
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

	