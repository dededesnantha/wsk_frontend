<?php require_once('views/component/alert.php') ?>
<?php foreach ($home as $row): ?>
  <?php if ($row['name'] == 'Slider'): ?>
    <div class="container-fluid p-0">
        <!-- slider -->
        <?php if (!empty($slide['judul'])): ?>
        <div class="col-md-12 p-0">
            <div class="slider">
                <ul>
                    <?php foreach ($Slider as $slide): ?>                        
                        <li>
                            <img src="<?= base_url('gallery').'/'.$slide['gambar'] ?>" alt="<?= $slide['judul'] ?>">
                            <?php if (trim($slide['judul']) != ""): ?>                       
                                <div class="color-white font-secondary bg-primary p-2">
                                    <span>
                                        <?= $slide['judul'] ?>
                                    </span>
                                </div>                        
                            <?php endif ?>                          
                        </li>
                    <?php endforeach ?>                      
                </ul>
            </div>                
        </div>
        <?php endif ?>
    </div>
  <!-- profile -->
  <?php elseif ($row['name'] == 'Profile'): ?>
    <div class="container">
      <div class="row">
        <div class="c-8">
          <section  style="margin: 10px 0px;background: #F2F3F5;border: 1px solid #dddf;border-radius: 3px;">
            <div class="row">
              <div class="c-12">
                <h1 class="font-secondary color-primary" style="margin-top: 20px;"><b><?= $row['judul'] ?></b></h1>
                <img src="<?= base_url('image').'/'.$main['profile']['gambar'] ?>" alt="logo" style='width:100%;' border="0" sizes="(max-width: 800px) 100vw, 800px">
                <article style="padding: 0 20px">
                  <p class="font-secondary"><?= $main['profile']['deskripsi'] ?></p>
                </article>
              </div>
            </div>
          </section>
           <?php elseif ($row['name'] == 'Client'): ?>
    <section>
        <div style="border: 1px solid #dfe1e5;border-radius: 8px;max-width:1100px;margin:0 auto;background: #F2F3F5">
        <h2 style="text-align: center;margin-bottom: 30px;">Recomended Driver In Bali</h2>
        <?php foreach ($client as $record): ?>
      <div class="w3-row-padding " style="margin-top: 76px;margin:0 auto;padding: 0 20px">
        <div class="row">
          <article class="c-6">
            <?php if (!empty($record['email'])): ?>
              <div style="margin-bottom: 5px;font-size: 16px;letter-spacing: 0.5px;">
                <img src="<?= base_url('image/sm/email.png') ?>" style="width: 25px;border-radius: 100%;margin-right:5px;"> Email : 
                <a href="mailto:<?=$record['email']?>" title=""><?= $record['email'] ?></a>
              </div>
            <?php endif ?>
            <?php if (!empty($record['phone'])): ?>
              <div style="margin-bottom: 5px;font-size: 16px;letter-spacing: 0.5px;">
                <img src="<?= base_url('image/sm/phone.png') ?>" style="width: 25px;border-radius: 100%;margin-right:5px;"> Phone : 
                <a href="tel:<?= $record['phone']?>" title=""><?= $record['phone'] ?></a>
              </div>
            <?php endif ?>
            <?php if (!empty($record['wa'])): ?>
              <div style="margin-bottom: 5px;font-size: 16px;letter-spacing: 0.5px;">
                <img src="<?= base_url('image/sm/wa.png') ?>" style="width: 25px;border-radius: 100%;margin-right:5px;"> WhatsApp : 
                <a href="https://api.whatsapp.com/send?phone=<?= $record['wa']?>" title=""><?= $record['wa'] ?></a>
              </div>
            <?php endif ?>
            <?php if (!empty($record['wechat'])): ?>
              <div style="margin-bottom: 5px;font-size: 16px;letter-spacing: 0.5px;">
                <img src="<?= base_url('image/sm/wechat.png') ?>" style="width: 25px;border-radius: 100%;margin-right:5px;"> WeChat : 
                <a href="weixin://dl/chat?<?= $record['wechat']?>" title=""><?= $record['wechat'] ?></a>
              </div>
            <?php endif ?>
            <?php if (!empty($record['kakaotalk'])): ?>
              <div style="margin-bottom: 5px;font-size: 16px;letter-spacing: 0.5px;">
                <img src="<?= base_url('image/sm/kakaotalk.png') ?>" style="width: 25px;border-radius: 100%;margin-right:5px;"> Kakaotalk : 
                <a href="https://story.kakao.com/ch/<?= $record['kakaotalk']?>" title=""><?= $record['kakaotalk'] ?></a>
              </div>
            <?php endif ?>
            <?php if (!empty($record['viber'])): ?>
              <div style="margin-bottom: 5px;font-size: 16px;letter-spacing: 0.5px;">
                <img src="<?= base_url('image/sm/viber.png') ?>" style="width: 25px;border-radius: 100%;margin-right:5px;"> Viber : 
                <a href="viber://pa?chatURI=<?= $record['viber']?>" title=""><?= $record['viber'] ?></a>
              </div>
            <?php endif ?>
            <?php if (!empty($record['line'])): ?>
              <div style="margin-bottom: 5px;font-size: 16px;letter-spacing: 0.5px;">
                <img src="<?= base_url('image/sm/line.png') ?>" style="width: 25px;border-radius: 100%;margin-right:5px;"> Line : 
                <a href="http://line.me/ti/p/~<?= $record['line']?>" title=""><?= $record['line'] ?></a>
              </div>
            <?php endif ?>
            <?php if (!empty($record['domain'])): ?>
              <div style="margin-bottom: 5px;font-size: 16px;letter-spacing: 0.5px;">
                <img src="<?= base_url('img/internet.svg') ?>" style="width: 30px; height: 30px;margin-right:5px;"alt="">Website: 
                <a href="<?= $record['domain'] ?>" title=""><?= $record['domain'] ?></a>
              </div>
            <?php endif ?>
          </article>
          <article class="c-6" style="text-align: center;float: right;">
              <img src="<?= base_url('image/'.$record['image']) ?>" style="max-width: ">
              <h2><?= $record['name'] ?></h2>
          </article>
        </div>
      </div>
      <div class="bor-client" style="border-top: 1px solid #dfe1e5;border-radius: 8px;">
          <div style="margin: 0 auto;text-align:center;">
            <div style="text-align: center; margin: 20px 10px;">
              <div class="row">
                <?php if (!empty($record['booking'])): ?>
                  <div class="c-4">
                    <a href="<?= $record['booking'] ?>">
                      <img src="<?= base_url('image/icon/callme.png') ?>" alt="" style="max-height: 200px; max-width: 200px"></a>
                  </div>
                <?php endif ?>
                <?php if (!empty($record['wa'])): ?>
                  <div class="c-4">
                    <a href="https://api.whatsapp.com/send?phone=<?= $record['wa']?>">
                      <img src="<?= base_url('image/icon/wa-chat.png') ?>" alt=""style="max-height: 200px; max-width: 200px"></a>
                  </div>
                <?php endif ?>
                <?php if (!empty($record['phone'])): ?>
                  <div class="c-4">
                   <a href="tel:<?= $record['phone']?>">
                    <img src="<?= base_url('image/icon/booking.png') ?>" alt=""></a>
                  </div>
                <?php endif ?>
              </div>
            </div>
          </div>
        </div>
    <?php endforeach ?>
      </div>
        <!-- iklan -->
        <div style="padding: 20px 0px">
          <img src="<?= base_url('image/icon/tayatha-website-tour-travel.jpg') ?>" alt="">
        </div>
    </section>
  <?php elseif ($row['name'] == 'Special'): ?>
    <section  style="margin: 10px 0px;background: #F2F3F5;border: 1px solid #dddf;border-radius: 3px;">
      <div class="row text-center">
        <?php if (empty($row['judul'])): ?>
          <div class="c-12">
            <h2 id="<?= str_replace(' ','_',$row['judul'])?>" class="text-header color-primary"><?=$row['judul']?></h2>
            <span class="line color-primary margin-bottom"></span>
          </div>
          <?php endif ?>
      </div>
      <div class="row">
        <?php foreach ($Special as $spesial): ?>
          <div class="c-12" style="padding-bottom: 40px;">
            <img src="<?= $spesial['img_path'].$spesial['img'] ?>" alt="<?= $spesial['title']?>" style='max-width:100%;' border="0" sizes="(max-width: 800px) 100vw, 800px">
            <h1 class="font-secondary text-center" style="margin-top: 20px; font-size: 20px"><b><?= $spesial['title'] ?></b></h1>
            <div style="font-family: 'Lato', sans-serif;text-align: justify; font-size: 16px;padding: 0 20px;">
              <?php if (trim($spesial['description'])!= ''): ?>
                <p class="font-secondary" ><?= $spesial['description'] ?></p>
              <?php endif ?>
            </div>
            </div>
            <?php endforeach ?>
          </div>
          </section>
  <?php elseif ($row['name'] == 'Product'): ?>
    <section  style="margin: 10px 2px;background: #F2F3F5;border: 1px solid #dddf;border-radius: 3px;">
      <div class="row">
        <div class="c-12">
          <h4 class="font-secondary">LATEST BLOG UPDATED</h4>
          <hr class="m-0" style="border: 0.5px solid #e3e3e3">
          <?php foreach ($Product as $produk): ?>
            <aside>
              <div style="max-width: 300px;float: left;padding-right: 10px; margin-bottom: 10px">
                <img src="<?= base_url('category').'/'.$produk['slug'] ?>" alt="<?= $produk['judul']?>" style='width:100%;' width="150" height="150" border="0" sizes="(max-width: 150px) 100vw, 150px" ALIGN="Top">
              </div>
              <div style="float: none; margin: 10px">
                <a href="<?= base_url('blog').'/'.$produk['slug'] ?>" title="<?= $produk['judul'] ?>" class="font-secondary"><?= $produk['judul'] ?></a>
                <article>
                  <?php if (trim($produk['seo_deskripsi'])!= ''): ?>
                    <div>
                      <p style="color:#000">
                        <?= substr(strip_tags($produk['seo_deskripsi']), 0,330)."...." ?>
                        </p>
                        </div>
                        <?php endif ?></article>
                    </div>
                  </aside>
                  <hr class="m-3" style="border: 0.5px solid #e3e3e3">
                  <?php endforeach ?>
                  <div class="c-12" style=" margin: 0 auto !important; text-align: center !important;">
                    <div class="pag-link p1" style="margin: 20px 0;">
                      <ul>
                        <a class="page-link" href="<?= base_url('/') ?>" aria-label="Previous">
                          <span aria-hidden="true">&laquo;</span>
                        </a>
                        <a class="is-active" href="<?= base_url('/') ?>"><li>1</li></a>
                        <a href="<?= base_url('blog') ?>"><li>2</li></a>
                        <a class="page-link" href="<?= base_url('blog') ?>" aria-label="Next">
                          <span aria-hidden="true">&raquo;</span>
                        </a>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              </section>
  <?php elseif ($row['name'] == 'Blog'): ?>
    <section  style="margin: 10px 2px;background: #F2F3F5;border: 1px solid #dddf;border-radius: 3px;">
      <div class="row">
        <div class="c-12">
          <h4 class="font-secondary">LATEST BLOG UPDATED</h4>
          <hr class="m-0" style="border: 0.5px solid #e3e3e3">
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
                        <?= substr(strip_tags($row['deskripsi']), 0,330)."...." ?></p>
                      </div>
                      <?php endif ?></article>
                  </div>
              </aside>
          <?php endforeach ?>
          <hr class="m-3" style="border: 0.5px solid #e3e3e3">
          <div style="margin-left: 40%">
            <?= $list['paging'] ?>
            </div>
          </div>
        </div>
      </section>
      <span style="position: relative;bottom: 8px;font-weight: 700">Share To :</span>
  <?php foreach ($main['contact'] as $profile_contact): ?>
    <?php if ($profile_contact['role'] != 0): ?>
      <a href="<?= $profile_contact['link'] ?>" title="<?= $profile_contact['title'] ?>" target="_blank">
        <img src="<?= $profile_contact['img'] ?>" alt="<?= $profile_contact['title'] ?>" width="35px"></a>
    <?php endif ?>
    <?php endforeach ?>
    </div> <!-- col- 8 -->
    <?php require_once('views/inc/sidebar-blog.php') ?>
  </div>
</div>
<?php endif ?>
<?php endforeach ?>