<?php if (isset($_SESSION['alert-success'])): ?>
	<div class="alert alert-success mt-4"><?= $_SESSION['alert-success'] ?></div>
<?php elseif(isset($_SESSION['alert-error'])): ?>
	<div class="alert alert-danger mt-4"><?= $_SESSION['alert-error'] ?></div>	
<?php elseif(isset($_SESSION['alert-info'])): ?>
	<div class="alert alert-info mt-4"><?= $_SESSION['alert-info'] ?></div>
<?php elseif(isset($_SESSION['alert-warning'])): ?>
	<div class="alert alert-warning mt-4"><?= $_SESSION['alert-warning'] ?></div>
<?php endif ?>