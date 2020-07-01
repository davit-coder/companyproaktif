 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
          
          	<div class="row">
			<div class="col-lg">
          	<?= form_open_multipart('p_editberita'); ?>          
          <div class="form-group row">
		    <label for="berita_id" class="col-sm-2 col-form-label mb-2"></label>
		    <div class="col-sm-10">
		      <input type="hidden" class="form-control" id="berita_id" name="berita_id" value="<?= $berita[0]->berita_id  ?>" readonly>
		    </div>		    
		  </div>
		  <div class="form-group row">
		    <label for="caption" class="col-sm-2 col-form-label mb-2">Caption News</label>
		    <div class="col-sm">
		      <input type="text" class="form-control" id="caption" name="caption" value="<?=  htmlspecialchars($berita[0]->caption)  ?>">
		    </div>		    
		  </div>

		 <div class="form-group mb-2">
			<label class="font-weight-bold">Promotion wording</label>
			<span><textarea id="editor" name="ket" ><?= $berita[0]->ket  ?></textarea></span>
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