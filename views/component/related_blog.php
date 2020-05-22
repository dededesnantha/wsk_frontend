<section class="" style="margin: 10px 0px;background: #F2F3F5;border: 1px solid #dddf;border-radius: 3px; padding: 10px 20px">
  <h4 class="font-secondary"><?= $single['judul_cat'] ?></h4>
  <div class="c-12">
    <div class="row">
      <?php foreach ($related as $row): ?>
        <div class="c-6" style="margin-bottom: 30px;">
          <div style="max-width: 100%">
            <a href="<?= base_url('blog/'.$row['slug']) ?>" title="<?= $row['judul'] ?>">
              <img src="<?= base_url('image').'/'.$row['gambar'] ?>" alt="<?= $row['judul'] ?>" style='width:100%;' width="150" height="150" border="0" sizes="(max-width: 150px) 100vw, 150px" ALIGN="Top"></a>
              <a href="<?= base_url('blog/'.$row['slug']) ?>" title="<?= $row['judul'] ?>" class="font-secondary" style="font-size: 16px; font-family: 'Lato', sans-serif;">
                <h4 class="font-secondary m-0 p-0">
                  <?= $row['judul'] ?></h4>
                </a>
                <article>
                  <?= substr(strip_tags($row['deskripsi']), 0,150).'...' ?></article>
          </div>
          </div>
      <?php endforeach ?>
    </div>
  </div>
</section>