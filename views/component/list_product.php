<?php foreach ($list['data'] as $row): ?>
<div class="c-12">
  <aside>
    <h1><a href="<?= base_url('link/'.$row['slug']) ?>" title="<?= $row['judul'] ?>" class="font-secondary"><?= $row['judul'] ?></a></h1>
    <div style="max-width: 300px;float: left;padding-right: 10px">
      <img src="<?= base_url('image').'/'.$row['gambar'] ?>" alt="<?= $row['judul'] ?>" style='width:100%;' width="150" height="150" border="0" sizes="(max-width: 150px) 100vw, 150px" ALIGN="Top">
    </div>
    <div style="float: none; margin: 10px">
      <article>
        <?= substr(strip_tags($row['deskripsi']), 0,150) ?>..</article>
      </div>
    </aside>
    </div>
<?php endforeach ?>