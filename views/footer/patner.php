   <?php if (!empty($row['data'])): ?>
    <?php if ($row['judul'] != ''): ?>  
    <h3 class="font-secondary color-white" style="font-size: 21px;font-weight: 500">Patner</h3>
    <?php endif ?>
    <ul class="text-left" style="list-style: unset;color: #fff;line-height: 1.8;font-size: 15px;font-weight: 500;list-style: none;padding: 0">
      <?php foreach ($row['data'] as $rows): ?>       
          <li style="margin-bottom: 5px;">
            <a href="<?= $rows['link'] ?>" title="<?= $rows['judul'] ?>" class="color-white">
              <i class="icon icon-arrow-right"> </i><?= $rows['judul'] ?>
            </a>
          </li>     
      <?php endforeach ?>
        </ul>
  <?php endif ?>