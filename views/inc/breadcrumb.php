<div class="c-12" style="background: #F2F3F5;display: inline-block;font-size: 12px;margin: 10px auto 0;padding: 10px 20px;width: 100%;border: 1px solid #dddf;border-radius: 3px;">
	<ol class="breadcrumb p-0 m-0" id="breadcrumb-single" style="background: #F2F3F5">
	<?php foreach ($breadcrumb as $row): ?>
		<?php if ($row['url']): ?>
			<li class="breadcrumb-item"><a href="<?= $row['url'] ?>"><?= $row['name'] ?></a></li>
		<?php else: ?>
		<?php if (end($breadcrumb) == $row): ?>
			<li class="breadcrumb-item active"><?= $row['name'] ?></li>
		<?php else: ?>
			<li class="breadcrumb-item"><?= $row['name'] ?></li>
		<?php endif ?>
		<?php endif ?>
	<?php endforeach ?>
	</ol>
	</div>
	