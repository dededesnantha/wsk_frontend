<?php if ($this->uri->segment(1) == 'link'): ?>
    <?php require_once('views/component/script_ratting.php') ?>
    <?php require_once('views/component/script_review.php') ?>
<?php elseif ($this->uri->segment(1) == 'blog'): ?>
    <?php require_once('views/component/script_ratting.php') ?>
<?php elseif(isset($param) && $param == 'page'): ?>
	<?php require_once('views/component/script_ratting.php') ?>
<?php elseif ($this->uri->segment(1) == 'tag'): ?>
	<?php require_once('views/component/script_ratting.php') ?>
<?php endif ?>