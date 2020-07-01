<div class="container-fluid">

          <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

     <?= form_error('excel', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

     <?= $this->session->flashdata('message');?>

		<div class="input-group ">
			<div class="custom-file col-sm-4">
			<form action="<?= base_url('uploadpencipta') ?>" method="post" enctype="multipart/form-data">				  	
				<input type="file" name="excelfile" class="custom-file-input"  />
				<label class="custom-file-label" for="excelfile">Choose file</label>
				</div>
				<div class="input-group-append">
				<button class="btn btn-outline-secondary" type="submit" >Upload</button>
				</div>
			</div>
		</form>
        </div>
        <!-- /.container-fluid -->

      </div>


