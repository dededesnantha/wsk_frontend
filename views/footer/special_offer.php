		<?php if ($row['judul'] != ''): ?>	
	            <h3 class="font-secondary"style="color: #fff;"><?= $row['judul'] ?></h3>
		<?php endif ?>
	    <ul class="text-left" style="list-style: unset;color: #d2dae2;line-height: 1.8;font-size: 15px;font-weight: 500;list-style: none;padding: 0;font-family: 'arial';">
	    	<?php foreach ($main['spesial'] as $spesial): ?>
	    	<?php if ($spesial['page_judul'] == null): ?>			
	    		<li style="margin-bottom: 5px;">
	    			<a href="<?= base_url('link').'/'.$spesial['product_slug'] ?>" title="<?= $spesial['product_judul'] ?>" class="color-white">
	    				<?= $spesial['product_judul'] ?></a>
	    		</li>
	    	<?php else: ?>	
	    	<li style="margin-bottom: 5px;">
	    		<a href="<?= base_url().'/'.$spesial['page_slug'] ?>" title="<?= $spesial['page_judul'] ?>" class="color-white"><?= $spesial['page_judul'] ?></a>
	    	</li>
	    	<?php endif ?>
	    	<?php endforeach ?> 
	    </ul>
	    <br>