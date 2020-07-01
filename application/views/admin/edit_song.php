 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
          
          	<div class="row">
			<div class="col-lg-8">
          	<?= form_open_multipart('p_editsong'); ?>          
          <div class="form-group row">
		    <label for="id_song" class="col-sm-2 col-form-label mb-2"></label>
		    <div class="col-sm-10">
		      <input type="hidden" class="form-control" id="id_song" name="id_song" value="<?= $song[0]->id_song  ?>" readonly>
		    </div>		    
		  </div>
		  <div class="form-group row">    
		   <label for="" class="col-sm-4 col-form-label mb-2">Nama Pencipta</label>
		    <div class="col-sm-8">		 
		     <input type="text" class="form-control" id="id_pencipta" name="id_pencipta" value="<?= $song[0]->id_pencipta?>" readonly>   
		    </div>
		</div>
		  <div class="form-group row">
		    <label for="name_lagu" class="col-sm-4 col-form-label mb-2">Judul Lagu</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" id="name_lagu" name="name_lagu" value="<?= $song[0]->name_lagu  ?>">
		    </div>
		</div>
		    <div class="form-group row">
		    <label for="genre" class="col-sm-4 col-form-label mb-2">Genre</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" id="genre" name="genre" value="<?= $song[0]->genre  ?>">
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