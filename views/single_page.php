            <section class="container-fluid" style="height: 350px; background: <?= AWS_PATH.'image/'.$single['gambar'] ?>;filter: blur(5px);position: absolute;z-index: -2;background-size: cover ">
            </section>
            <!--  -->

            <section class="container">
                    <div class="row">
                      <div class="c-8" style="padding-top: 50px;">
                        <?php require_once('views/component/alert.php') ?>               
                       <?php if ($single['gambar']): ?>
                        <img src="<?= AWS_PATH.'image/'.$single['gambar'] ?>" alt="<?= $single['judul'] ?>"style="border-radius: 4px;box-shadow: 1px 1px 16px -2px rgba(0,0,0,.3);" /> 
                        <?php endif ?>
                        <?php require_once('views/component/ratting.php') ?>
                        <div class="bg-white">
                          <h1 id="<?= str_replace(' ','_',$single['judul'])?>" style="margin: 5px 0px"><?= $single['judul'] ?></h1>
                      </div>
                      <?php require_once('views/inc/breadcrumb.php') ?>       
                      <div class="p-1 bg-white" id="<?= str_replace(' ','_',$single['judul'])?>">
                       <?= $single['deskripsi'] ?>
                   </div>
                   <hr style="margin: 25px 0 15px 0">      
                   <?php require_once('views/component/give_review.php') ?>     
                   <hr style="margin: 25px 0 15px 0">
                   <?php require_once('views/component/share.php') ?>         
                   <?php require_once('views/component/contact.php') ?>     
                   <hr>
               </div> 
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
               <?php require_once('views/inc/sidebar-blog.php') ?>     
           </div>
       </section>