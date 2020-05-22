    <div class="container">
        <div class="row">
            <div class="c-8">
                <?php require_once('views/inc/breadcrumb.php') ?>
                <section class="" style="margin: 10px 0px;background: #F2F3F5;border: 1px solid #dddf;border-radius: 3px; padding: 20px 20px">
                    <?php require_once('views/component/alert.php') ?>
                    <div class="text-center">
                        <h1 id="<?= str_replace(' ','_',$single['judul']) ?>" class="color-primary" style="margin-bottom: 40px;font-family: 'Josefin Sans', sans-serif">
                        <?php if ($main['profile']['judul'] == $single['judul']): ?>
                            All Tour<?php else: ?><?= $single['judul'] ?><?php endif ?></h1>
                        <div class="line color-primary"></div>
                    </div>
                    <div class="row">
                        <?php require_once('views/component/list_product.php') ?>
                        <div class="col-12 text-center" style="display: flex;">
                            <?= $list['paging'] ?></div>
                    </div>
                </section>
            </div>
            <?php require_once('views/inc/sidebar-blog.php') ?>
        </div>
    </div>