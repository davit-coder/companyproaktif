<?php 
     $sql = 'SELECT * FROM webmusik.berita where is_active = 1';
     $berita = $this->db->query($sql)->result_array();
?>
<?php foreach ($berita as $b):?> 
<div id="<?= $b['berita_id'] ?>" class="modal modal-fixed-footer">
  <div id="news1" class="modal-content">
    <h4><?= $b['caption'] ?></h4>
    <hr width="75%"></hr>
    <img src="<?= base_url('asset/img/news/') . $b['img_berita']; ?>" />
     	<?= $b['ket'] ?>

  </div>
</div>
	<?php endforeach; ?>