	    <?php if ($row['judul'] != ''): ?>
	    	<h3 class="font-secondary color-white" style="font-size: 24.5px;font-weight: 500"><?= $row['judul'] ?></h3>
	    <?php endif ?>
	    <ul class="text-left" style="list-style: unset;color: #fff;line-height: 1.8;font-size: 15px;font-weight: 500;list-style: none;padding: 0">
	    	<?php foreach ($main['menu'] as $key): ?> 
	    	<?php if ($key['link'] == 'kategori'): ?>
	    	 <?php else: ?>	
	    	<li style="margin-bottom: 5px;border-bottom: 1px solid #fff;"><a href="<?= $key['link'] ?>" title="<?= $key['judul'] ?>" class="color-white"><i class="icon icon-arrow-right"> </i><?= $key['judul'] ?></a></li>
	    	<?php endif ?>     
	    	<?php endforeach ?>  
	    </ul>
		
	    