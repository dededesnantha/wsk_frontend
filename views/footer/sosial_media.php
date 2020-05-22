		<?php if ($row['judul'] != ''): ?>	
			<h3 class="font-secondary"style="color: #fff;"><?= $row['judul'] ?></h3>
		<?php endif ?>
		<?php foreach ($main['social_media'] as $social_media): ?>	
			<a href="<?= $social_media['link'] ?>" title="<?= $social_media['title'] ?>"><img src="<?= $social_media['img'] ?>" alt="<?= $social_media['title'] ?>" width="40px"></a>
		<?php endforeach ?>
