<?php foreach ($list['data'] as $row): ?>
  <aside>
    <div style="max-width: 300px;float: left;padding-right: 10px; margin-bottom: 10px"> 
      <img src="<?= base_url('image/'.$row['gambar']) ?>" alt="<?= $row['judul']?>" style='width:100%;' width="150" height="150" border="0" sizes="(max-width: 150px) 100vw, 150px" ALIGN="Top">
    </div>
    <div style="float: none; margin: 10px">
      <a href="<?= base_url('blog/'.$row['slug']) ?>" title="<?= $row['judul'] ?>" class="font-secondary"><?= $row['judul'] ?></a>
      <article>
        <?php if (trim($row['deskripsi'])!= ''): ?>
          <div>
            <p style="color:#000">
              <?= substr(strip_tags($row['deskripsi']), 0,330)."...." ?>
            </p>
          </div>
        <?php endif ?>
      </article>
    </div>
  </aside>
  <?php endforeach ?>