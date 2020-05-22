<div class="pull-left" style="margin-bottom: 10px; padding: 0 20px">
  <span style="position: relative;bottom: 8px;">Share The Article If Useful For You!</span>
  <br>
  <div style="margin-left: 20px">
    <a href="mailto:?Subject=<?= $single['judul'] ?>&amp;Body=<?= $single['judul'] ?><?= BASE_URL ?><?= $_SERVER['REQUEST_URI'] ?>" target="_blank"><img src="<?= base_url('img/icon') ?>/email.png"  width="32px" style="border-radius: 5px"></a>
    <a href="whatsapp://send?text=<?= $single['judul']?><?= BASE_URL ?><?= $_SERVER['REQUEST_URI'] ?>" target="_blank"><img src="<?= base_url('img/icon/wa.png')?>"  width="32px" style="border-radius: 5px"></a>
    <a href="https://lineit.line.me/share/ui?url=<?= BASE_URL ?><?= $_SERVER['REQUEST_URI'] ?> " target="_blank"><img src="<?= base_url('img/icon') ?>/line.png"  width="32px" style="border-radius: 5px"></a>
    <a href="https://www.facebook.com/sharer.php?u=<?= BASE_URL ?><?= $_SERVER['REQUEST_URI'] ?>" target="_blank"><img src="<?= base_url('img/icon') ?>/facebook.png"  width="32px" style="border-radius: 5px"></a>
    <a href="https://twitter.com/share?url=<?= BASE_URL ?><?= $_SERVER['REQUEST_URI'] ?> &amp;text=<?= $single['judul'] ?>&amp;hashtags=<?= $single['judul'] ?>" target="_blank"><img src="<?= base_url('img/icon') ?>/twitter.png"  width="32px" style="border-radius: 5px"></a>
  </div>
</div>
