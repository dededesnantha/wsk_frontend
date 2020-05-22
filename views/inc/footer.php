<?php if (count($main['menu_footer']) != 0): ?>
  <div class="row m-0">
    <header id="header" class="container-fluid p-0">
      <nav class="container-fluid" id="nav_bg"style="margin: 10px 0px;background: #F2F3F5;border: 1px solid #dddf;border-radius: 3px;">
        <div class="row" style="text-align: center;">
          <label for="show-menu-1" class="show-menu color-blank" style="line-height:50px;top: 7px;"><i class="icon icon-menu" style="font-size: 26px"></i></label>
          <input type="checkbox" id="show-menu-1" role="button">
          <div class="c-12 row navigasi nav-bottom">
            <ul id="menu" class="p-0 nav" style="height: auto;position: relative;margin: auto; ">
              <?php foreach ($main['menu_footer'] as $row): ?>
                <li class="nav">
                  <a href="<?= $row['link'] ?>" title="<?= $row['link'] ?>"><?= $row['judul']?></a>
                </li>
              <?php endforeach ?>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    </div>
<?php endif ?>
  <footer class="container-fluid">
    <div class="container p-4">
      <div class="row">
        <?php for ($i = 1; $i <= 3; $i++) { ?><div class="c-4">
            <?php foreach ($main['footer_kolom'.$i] as $row): ?>
              <?php if ($row['template'] != null): ?>
                <?php require_once($row['template']); ?>
              <?php endif ?>
            <?php endforeach ?>
            </div>
            <?php } ?>
          </div>
        <div>
          <h3>Support</h3>
          <p><a href="https://www.baliya.id/" title="BALIYA.ID">BALIYA.ID</a></p> 
          <p><a href="https://www.tenunbali.com/" title="Tenunbali.com">Tenunbali.com</a></p> 
          <p><a href="https://www.qloora.com/" title="Qloora.com">Qloora.com</a></p> 
        </div>
        </div>
        <hr style="border: .1px solid #e9ebee">
        <div class="c-12" style="color: #fff; margin: 0 auto; text-align: center;">
          <small>&copy; 2019 Copyright . All Rights Reserved.Powered by
            <span>
              <a href="https://www.tayatha.com/" title="tayatha" target="_blank">tayatha</a>
            </span>
          </small>
        </div>
      </footer>
      <script type='text/javascript'>
        document.addEventListener('copy', function (e){
                  e.preventDefault();
                  e.clipboardData.setData("text/plain", ""+window.location.href+"");
              })
      </script>
    </div>
</body>
</html>