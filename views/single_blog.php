<div class="container">
  <div class="row">
    <div class="c-8">
      <?php require_once('views/component/alert.php') ?>
      <?php require_once('views/inc/breadcrumb.php') ?>
      <section  style="margin: 10px 0px;background: #F2F3F5;border: 1px solid #dddf;border-radius: 3px;">
        <div class="container-fluid">
          <h1 class="font-secondary " style="font-size: 32px"><b><?= $single['judul'] ?></b></h1>
          <?php require_once('views/component/ratting.php') ?>
          <?php if ($single['gambar']): ?>
            <div class="wp-block-image">
              <img src="<?= base_url('image').'/'.$single['gambar'] ?>" alt="<?= $single['judul'] ?>" style='width:100%;' border="0" ssizes="(max-width: 800px) 100vw, 800px">
            </div>
          <?php endif ?>
          <p class="font-secondary"><?= $single['deskripsi'] ?></p>
          <?php require_once('views/component/give_review.php') ?>
          <?php require_once('views/component/tag.php') ?>
          <div style="margin: 20px 0">
            <?php require_once('views/component/share.php') ?>
          </div>
          <hr class="m-0" style="border: 0.1px solid #e3e3e3">
        </div>
        <div class="row" style="margin-top: 20px">
      <?php if (!empty($list_page)): ?>
        <?php require_once('views/component/list_page.php') ?>
      <?php endif ?>   
        </div>
      </section>
      <!-- client -->
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
                      <img src="<?= base_url('image/icon/callme.png') ?>" alt=""style="max-height: 200px; max-width: 200px"></a>
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
        <?php require_once('views/component/related_blog.php') ?>
    </div>
        <?php require_once('views/inc/sidebar-blog.php') ?>
      </div>
    </div>
  </div>
  