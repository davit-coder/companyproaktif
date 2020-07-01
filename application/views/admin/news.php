 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

         

          <?= $this->session->flashdata('message');?>

          

          <div class="row">
          	<div class="col-lg">
          		
          		<a href="<?php echo base_url(); ?>added" class="btn btn-primary mb-2">Add New News</a>
          		<table class="table table-hover">
				  <thead>
				    <tr>
				      <th scope="col">#</th>				      
				      <th scope="col">Caption</th>				     
				      <th scope="col">Action</th>				     
				    </tr>
				  </thead>
				  <tbody>
				  	<?php $i = 1; ?>
				  	<?php  foreach ($berita as $b) :?>
				    <tr>
				      <th scope="row"><?= $i; ?></th>
				      
				      <td class="col-sm-4"><?= $b['caption'] ?></td>
				      <td>
				      	<a href="<?= base_url(); ?>newsedit?ID=<?= $b['berita_id'] ?>" class="badge badge-success">Edit</a>
				      	<a href="<?= base_url(); ?>newshapus?ID=<?= $b['berita_id'] ?>" class="badge badge-danger tombol">Delete</a>

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


	

	