    <span class="pull-right" style="margin-bottom: 10px;">
        <span style="font-family: 'Josefin Sans', sans-serif;position: relative;top: -10px;padding-right: 5px;">Contact : </span>
        <?php foreach ($main['contact'] as $row): ?>
        	<?php if ($row['role'] != 0): ?>        		
                <a href="<?= $row['link'] ?>" title="<?= $row['title'] ?>" target="_blank">
                	<img src="<?= $row['img'] ?>" alt="<?= $row['title'] ?>" width="35px">
                </a>
        	<?php endif ?>
        <?php endforeach ?>       
    </span>