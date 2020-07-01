	<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          <?= form_error('caption', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

          <?= $this->session->flashdata('message');?>
          <?= form_open_multipart('added'); ?> 

		<form action="<?= base_url('added'); ?>" method="post">
	      
	     <div class="form-group"> 
	        <div class="col-sm"> 
	         
		    <input type="text" class="form-control mb-2" id="caption" name="caption" placeholder="Caption">
		</div>

		<div class="form-group mb-2">
			<label class="font-weight-bold">Promotion wording</label>
		<span><textarea id="editor" name="ket"></textarea></span>
		</div>
		    <div class="form-group row mb-2">
		    <div class="col-sm-1">Picture</div>
		    <div class="col-sm-6">
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
	 
	
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Add</button>
	      </div>
	</form>


