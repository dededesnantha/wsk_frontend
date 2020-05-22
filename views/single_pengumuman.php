<div class="container">
<?php foreach ($single_kelas as $pengumuman): ?>
	<div class="content">
	<div class="c-12" style="margin: 30px 0px;">
		<div style="border: 2px solid #333">
			<div style="text-align: center;">
				<h2 style="font-weight: 800"><?= $pengumuman['title'] ?></h2>
			</div>
			<br>
			<div style="padding: 0 20px">
				<p><?= $pengumuman['content'] ?></p>
			</div>
			<div style="text-align: right; padding: 20px 20px">
				<b><i>Update : <?= date('d-m-Y', strtotime($pengumuman['publish'])); ?> - <?= date('d-m-Y', strtotime($pengumuman['end'])); ?></i></b> 
			</div>
		</div>
	</div>
	</div>
<?php endforeach ?>
</div>