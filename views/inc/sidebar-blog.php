<div class="c-4 p-0">
  <div style="margin: 10px 0px;background: #F2F3F5;border: 1px solid #dddf;border-radius: 3px; padding: 10px 20px">
    <div class="container" style="position: absolute;z-index: -1"></div>
  <?php foreach ($sidebar['product'] as $key): ?>
    <?php if ($key['data'] != null) { ?>
      <div class="p-1 color-primary" style="margin-bottom: 10px">
        <?php if ($key['name']): ?>
          <div class="card-body-1 mt-4">
            <h2 class="font-secondary" style="margin: 0">
              <b><?= $key['name'] ?></b>
            </h2>
          </div>
          <?php endif ?>
          <ul class=" p-0 m-0" style="padding: 0;list-style: none;margin-top: 2px">
            <?php foreach ($key['data'] as $row): ?>
              <li style="padding: 10px 0;">
                <aside>
                  <div style="">
                  <div style="float: left; margin: 5px 10px">
                    <a href="<?= base_url('link/'.$row['slug']) ?>" title="<?= $row['judul'] ?>">
                      <img src="<?= base_url('gambar/50x44').'/'.$row['gambar'] ?>" alt="<?= $row['judul'] ?>" class="w3-left w3-margin-right" style="width:50px" ALIGN="Top"></a>
                    </div>
                    <div style="float: none;">
                      <article>
                        <a href="<?= base_url('link/'.$row['slug']) ?>" title="<?= $row['judul'] ?>" style="text-decoration: none; color: #3498db;font-family: 'Lato', sans-serif;" ><?= $row['judul'] ?></a>
                      </article>
                    </div>
                  </div>
                </aside>
              </li>
              <hr class="m-0" style="border-bottom: 0.1px solid #e3e3e3">
          <?php endforeach ?>
          </ul>
        </div>
    <?php } ?>
<?php endforeach ?>
</div>
<?php if ($main['profile']['tripadvisor'] != ''): ?>
  <div style="margin: 10px 0px;background: #F2F3F5;border: 1px solid #dddf;border-radius: 3px; padding: 10px 20px">
    <div class="w3-container w3-padding w3-light-grey">
      <h4 itemprop="name">Tripadvisor</h4>
      </div>
      <?= $main['profile']['tripadvisor']; ?>
      </div>
    <?php endif ?>
<?php if ($sidebar['blog']!= 0): ?>
  <div style="margin: 10px 0px;background: #F2F3F5;border: 1px solid #dddf;border-radius: 3px; padding: 10px 20px">
    <?php if ($sidebar['blog']!= 0): ?>
      <div class="card-body-1 mt-4">
        <h2 class="font-secondary" style="margin: 0">
          <b><?= $row['judul'] ?></b>
        </h2>
        </div>
      <?php endif ?>
<ul class=" p-0 m-0" style="padding: 0;list-style: none;margin-top: 2px">
  <?php foreach ($sidebar['blog'] as $row): ?>
    <li style="padding: 10px 0;">
      <aside>
        <div style="padding-bottom: 20px">
          <div style="float: left; margin: 0px 10px">
            <a href="<?= base_url('blog/'.$row['slug']) ?>" title="<?= $row['judul'] ?>">
              <img src="<?= base_url('gambar/50x44').'/'.$row['gambar'] ?>" alt="<?= $row['judul'] ?>" class="w3-left w3-margin-right" style="width:50px" ALIGN="Top"></a>
            </div>
            <div style="float: none;">
              <article>
                <a href="<?= base_url('blog/'.$row['slug']) ?>" title="<?= $row['judul'] ?>" style="text-decoration: none; color: #3498db;font-family: 'Lato', sans-serif;" >
                    <?= $row['judul'] ?></a>
              </article>
            </div>
          </div>
        </aside>
      </li>
      <hr class="m-0" style="border-bottom: 0.1px solid #e3e3e3">
<?php endforeach ?>
    </ul>
  </div>
<?php endif ?>
</div>
