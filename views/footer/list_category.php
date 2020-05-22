		<?php if ($row['judul'] != ''): ?>	
	    	<h3 class="font-secondary"style="color: #fff;"><?= $row['judul'] ?></h3>
	    <?php endif ?>
	    <ul class="text-left" style="list-style: unset;color: #d2dae2;line-height: 1.8;font-size: 15px;font-weight: 500;list-style: none;padding: 0;font-family: 'arial';">
	    	<?php foreach ($main['list_category'][$row['id_galeri_kategori']] as $list_categorys): ?>
	    	 <li style="margin-bottom: 5px;">
	    	 	<a href="<?= base_url('link').'/'.$list_categorys['slug'] ?>" title="<?= $list_categorys['judul'] ?>" class="color-white"><?= $list_categorys['judul'] ?></a></li>
	    	<?php endforeach ?>
	    </ul>        
	    <br>	