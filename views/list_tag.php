		<!-- content -->
        <div class="container">
            <div class="row">
                <div class="c-12">
                    <?php require_once('views/component/alert.php') ?>
                    <?php require_once('views/inc/breadcrumb.php') ?>

                    <section  style="margin: 10px 0px;background: #F2F3F5;border: 1px solid #dddf;border-radius: 3px;">
                            <div class="row">
                              <div class="c-12">
                                <h1 class="font-secondary color-primary" style="font-size: 30px"><?= $single['judul'] ?> </h1>
                                <p class="font-secondary"> 
                                    <?= substr(strip_tags($list['data'][0]['deskripsi_blog']), 0,300) ?>
                                    <?= substr(strip_tags($list['data'][0]['deskripsi_product']), 0,300) ?>..</p>
                              <!-- end blog -->
                          </div>
                        </div>
                    </section>

                    <section  style="margin: 10px 0px;background: #F2F3F5;border: 1px solid #dddf;border-radius: 3px;">
                        <div class="card-body-1">                                  
                            <h2 style="margin-bottom:7px;margin-left:10px;margin-top: 10px">Contents</h2>
                            <div style="margin:0;margin-left:20px;">
                                <a href="#judul" style="text-decoration: none;color: #3498db;font-family: 'Lato', sans-serif">
                                    <?= $single['judul'] ?>
                                </a>
                            </div>
                            <div style="padding: 0 20px">   
                               <?php $i = 0; ?>
                               <?php foreach ($list['data'] as $row): ?>                            
                                <?php $i++; ?>
                                    <button type="submit" class="btn btn-light">
                                        <a href="#<?= $row['slug_product'].$row['slug_blog'] ?>" title=" <?= $row['judul_product'].$row['judul_blog'] ?> "> <?= $row['judul_product'].$row['judul_blog'] ?></a></button>
                                <?php endforeach ?>                           
                            </div>
                        </div>
                    </section>


                    <!-- list content -->
                <section  style="margin: 10px 0px;background: #F2F3F5;border: 1px solid #dddf;border-radius: 3px;">
                 <div class="row">
                        <?php require_once('views/component/list_tag.php') ?>
                        <div class="col-12 text-center" style="display: flex;">
                            <?= $list['paging'] ?>
                        </div>
                </div>    
                    
                </section> 
            </div>
                <?php require_once('views/inc/sidebar-list.php') ?>           
            </div>
        </div>
    </div>