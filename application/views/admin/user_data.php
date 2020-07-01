 <!-- Begin Page Content -->
      
          <h1 class="h3 mb-4 ml-2 text-gray-800"><?= $title; ?></h1>

          <div class="row">
            <div class="col-lg">
              
                <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>                                       
                    <th scope="col">Data Created</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  
                  <?php $i = 1; ?>
                  <?php foreach ($menu as $u) : ?>
                    
                  <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $u['name']; ?></td>
                    <td><?= $u['email']; ?></td>                    
                    <td><?= date('d F Y', $u['date_created']); ?></td>  
                    <td>                 
                        <a href="<?= base_url(); ?>deleteuser?ID=<?= $u['id'] ?>" class="badge badge-danger tombol">Delete</a>
                    </td>                 
                  </tr>
                  <?php $i++; ?>
                  <?php endforeach; ?>
                </tbody>
              </table>           



            </div>
          </div>
     
     

      

