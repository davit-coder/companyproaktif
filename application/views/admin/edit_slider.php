 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
          
          	<div class="row">
			<div class="col-lg-8">
          	<?= form_open_multipart('prosesedit'); ?>          
          <div class="form-group row">
		    <label for="slider_id" class="col-sm-2 col-form-label mb-2"></label>
		    <div class="col-sm-10">
		      <input type="hidden" class="form-control" id="slider_id" name="slider_id" value="<?= $slider[0]->slider_id  ?>" readonly>
		    </div>		    
		  </div>
		  <div class="form-group row">
		    <label for="name_image" class="col-sm-2 col-form-label mb-2">Name Image</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="name_image" name="name_image" value="<?= $slider[0]->name_image  ?>">
		    </div>		    
		  </div>
		  <div class="form-group row">
		    <div class="col-sm-2">Picture</div>
		    <div class="col-sm-10">
		    	<div class="row">
		    		<div class="col-sm-3">
		    			<img src="<?= base_url('asset/img/slider/') . $slider[0]->img_slider ?>" class="img-thumbnail">
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
		  <div class="form-group row justify-content-end">
		  <div class="form-check ">
				<input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
				<label class="form-check-label" for="is_active">
			    Active?
			</label>
		  </div>
		</div>

		  <div class="form-group row justify-content-end">		  	
		  	<div class="col-sm-10">
		  		<button type="submit" class="btn btn-primary">Edit</button>
		  	</div>
		  </div>

		</div>
        </div>
          	
       

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->