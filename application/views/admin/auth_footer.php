<!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url() ?>assets/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url() ?>assets/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url() ?>js/sb-admin-2.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>asset/js/datatables/datatables.min.js"></script>
  

  <script>
    $('.custom-file-input').on('change', function(){
      let fileName = $(this).val().split('\\').pop();
      $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
    
  </script>

  <script>
    $('.tombol').on('click', function(e){

      e.preventDefault();
      const href = $(this).attr('href');

      Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.value) {
        document.location.href = href;
      }
    })
    });
  </script>

  <script type="text/javascript">
  $(document).ready(function(){
    $('.data').DataTable();
  });
</script>
  

</body></html>

