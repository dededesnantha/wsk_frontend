<section  style="margin: 10px 0px;background: #F2F3F5;border: 1px solid #dddf;border-radius: 3px;">
	<div class="card-body-1">
		<p class="font-secondary p-0">Tag :</p>
		<div style="padding: 0 20px">
		<?php foreach ($tag as $tags): ?>
			<button type="submit" class="btn btn-light"><a href="<?= base_url('tag').'/'.$tags['slug']  ?>" title="<?= $tags['judul'] ?>"><?= $tags['judul'] ?></a></button>
			<?php endforeach ?>
		</div>
	</div>
</section>
