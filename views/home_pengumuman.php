<div class="container">
<?php foreach ($Pengumuman as $pengumuman): ?>
	<div class="content">
	<div class="c-12" style="margin-top: 30px;">
		<div style="border: 2px solid #333">
			<div style="text-align: center;">
				<h2 style="font-weight: 800"><?= $pengumuman['title'] ?></h2>
			</div>
			<br>
			<div style="padding: 0 20px">
				<p><?= $pengumuman['content'] ?></p>
			</div>
			<div style="text-align: right; padding: 20px 20px">
				Start <?= date('d-m-Y', strtotime($pengumuman['publish'])); ?> - <?= date('d-m-Y', strtotime($pengumuman['end'])); ?>
			</div>
		</div>
	</div>
	</div>
<?php endforeach ?>
</div>