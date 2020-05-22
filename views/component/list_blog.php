      <div class="blog-conten">
          <div class="row">
        <?php foreach ($list['data'] as $row): ?>
          <div class="c-6" style="margin-bottom:20px">
               <div class="" style="padding: 0 20px">
                <a href="<?= base_url('blog/'.$row['slug']) ?>" title="<?= $row['judul'] ?>" class="font-secondary" style="font-size: 20px">
                  <?= $row['judul'] ?></a>
                <br>
                <div style="margin: 0 auto; text-align: center;">
                <a href="<?= base_url('blog/'.$row['slug']) ?>" title="<?= $row['judul'] ?>">
                  <img src="<?= base_url('image').'/'.$row['gambar'] ?>" alt="<?= $row['judul'] ?>" style='min-width:70%;' width="150" height="150" border="0" sizes="(max-width: 150px) 100vw, 150px">
                </a>
                </div>
                <article>
                  <?= substr(strip_tags($row['deskripsi']), 0,300).'...' ?>
                </article>
              </div>
            </div>
        <?php endforeach ?>
            <div class="c-12" style=" margin: 0 auto !important; text-align: center !important;">
              <div class="pag-link p1" style="margin: 20px 0;">
                <ul>
                  <a class="page-link" href="<?= base_url('/') ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                  <a href="<?= base_url('/') ?>"><li>1</li></a>
                  <a class="is-active" href="<?= base_url('blog') ?>"><li>2</li></a>
                  <a class="page-link" href="<?= base_url('blog') ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </ul>
              </div>
            </div> 
          </div>
        </div>
      </div>     