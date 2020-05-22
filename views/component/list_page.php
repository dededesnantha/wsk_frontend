<?php foreach ($list_page as $row): ?>
  <div class="c-12" style="margin-bottom:20px">
    <div class="blog-conten mb-3">
      <div class="row card-3">
        <div class="c-5">
          <img src="<?=  base_url('image').'/'.$row['gambar'] ?>" class="card-img-top" alt="<?= $row['judul'] ?>">
        </div>
        <div class="c-7">
          <div class="text-blog">
            <h4 style="color: #2574a9; font-weight: 500"><?= $row['judul'] ?></h4>
            <p class="card-text">
              <?= substr(strip_tags($row['deskripsi']), 0,150) ?></p>
              <div class="pull-right">
                <a href="<?= base_url($row['slug']) ?>" class="btn btn-outline-primary">
                  <?= $main['label']['Read More'] ?> ></a>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endforeach ?>