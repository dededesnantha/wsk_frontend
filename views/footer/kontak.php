	<?php if ($row['judul'] != ''): ?>
		<h3 class="font-secondary"style="color: #fff;"><?= $row['judul']?></h3>
	<?php endif ?>		

<?php foreach ($main['contact'] as $contacts): ?>    
	
	<ul class="text-left m-0 p-0" style="list-style: unset;color: #d2dae2;line-height: 1.8;font-weight: 500;list-style: none;padding: 0;font-family: 'arial';">
	<?php if ($contacts['role'] != 0): ?>
			<?php if (!$contacts['image_null']): ?>
				<li class="p-0">
					<a class="color-white" href="<?= $contacts['link']?>" title="<?= $contacts['title']?>" target="_blank">
						<img style="position: relative;top: 10px;" src="<?= $contacts['img'] ?>" alt="<?= $contacts['title'] ?>" width="30px">
					</a>
					<span class="color-white p-0"><?= $contacts['title'] ?> :</span> <a class="color-white" href="<?= $contacts['link'] ?>" title="<?= $contacts['title'] ?>" target="_blank"><span><?= $contacts['id'] ?></span></a>
				</li>
			<?php endif ?>
			<br>

	<?php else: ?>

		<?php if (!$contacts['image_null']): ?>
			  	<img style="position: relative;top: 10px;" src="<?= $contacts['img'] ?>" alt="<?= $contacts['title'] ?>" width="30px">
		<?php endif ?>
			<span class="color-white"><?= $contacts['title'] ?> : <span ><?= $contacts['id'] ?></span></span><br>
	<?php endif ?>

	</ul> 
<?php endforeach ?>

<ul class="text-left" style="list-style: unset;color: #d2dae2;line-height: 1.8;font-size: 15px;font-weight: 500;list-style: none;padding: 0;font-family: 'arial';">
	<li style="margin-bottom: 5px;">
		<a href="#" title="<?= $main['profile']['alamat'] ?>" class="color-white"><i class="fa fa-map-marker" aria-hidden="true"></i> <?= $main['label']['Address'] ?> : <?= $main['profile']['alamat'] ?></a></li>
	</ul>
		
<hr>