<div class="container">
    <div class="row">
        <div class="c-12">
            <?php require_once('views/component/alert.php') ?>
            <?php require_once('views/inc/breadcrumb.php') ?>
            <section  style="margin: 10px 0px;background: #F2F3F5;border: 1px solid #dddf;border-radius: 3px;">
                <div class="text-center">
                    <h1 class="font-secondary color-primary" id="<?= str_replace(' ','_',$single['judul'])?>" style="font-size: 30px">
                <?php if ($main['profile']['judul'] == $single['judul']): ?>
                    All Blog
                <?php else: ?>
                    <?= $single['judul'] ?>
                <?php endif ?></h1>
                </div>
            <?php require_once('views/component/list_blog_category.php') ?>
            <div class="col-12 m-auto" style="display: flex;">
                <?= $list['paging'] ?>
            </div>
        </section>
        </div>
        <?php require_once('views/inc/sidebar-list.php') ?>
    </div>
</div>
