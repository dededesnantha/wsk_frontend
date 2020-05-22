    <?php $i=0; ?>
    <?php foreach ($list['data'] as $row): ?>
    <?php $i++; ?>            
    <div class="c-6  mb-3">
      <div class="blog-conten">          
              <div class="row">
                <?php if ($row['judul_product'] != ''): ?>
                      <div class="" style="margin-bottom: 10px; padding: 20px 30px;">
                          <img src="<?=  base_url('image').'/'.$row['gambar_product'] ?>"alt="<?= $row['judul_product'] ?>" style='min-width:70%;'>
                        <a href="<?= base_url('link/'.$row['slug_product']) ?>" title="<?= $row['slug_blog'] ?>" class="font-secondary" style="font-size: 20px"><?= $i.'. '.$row['judul_product'] ?></a>
                        <br>
                          <article>
                            <?= substr(strip_tags($row['deskripsi_product']), 0,150).'...' ?>
                          </article>
                      </div>

                <?php elseif($row['judul_blog'] != ''): ?>
                   
                      <div class="" style="margin-bottom: 10px; padding: 20px 30px;">
                        <img src="<?= base_url('image').'/'.$row['gambar_blog'] ?>" alt="<?= $row['judul_product'] ?>" style='min-width:70%;'>
                        <a href="<?= base_url('blog/'.$row['slug_blog']) ?>" title="<?= $row['judul_product'] ?>" class="font-secondary" style="font-size: 20px"><?= $i.'. '.$row['judul_blog'] ?></a>
                        <br>
                        <article>
                          <?= substr(strip_tags($row['deskripsi_blog']), 0,150).'...' ?> 
                        </article>
                      </div>
                <?php endif ?>
              </div>
      </div>
    </div>
    <?php endforeach ?>      