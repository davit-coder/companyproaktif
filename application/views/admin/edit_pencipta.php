 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
          
          	<div class="row">
			<div class="col-lg-8">
          	<?= form_open_multipart('p_editpencipta'); ?>          
          <div class="form-group row">
		    <label for="id_pencipta" class="col-sm-2 col-form-label mb-2"></label>
		    <div class="col-sm-10">
		      <input type="hidden" class="form-control" id="id_pencipta" name="id_pencipta" value="<?= $pencipta[0]->id_pencipta  ?>" readonly>
		    </div>		    
		  </div>
		  <div class="form-group row">
		    <label for="nama_pencipta" class="col-sm-4 col-form-label mb-2">Nama Pencipta</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" id="nama_pencipta" name="nama_pencipta" value="<?= $pencipta[0]->nama_pencipta  ?>">
		    </div>
		</div>
		    <div class="form-group row">
		    <label for="share" class="col-sm-4 col-form-label mb-2">Share</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" id="share" name="share" value="<?= $pencipta[0]->share  ?>">
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