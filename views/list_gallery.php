<!-- content -->
        <div class="container">            
            <div class="row">
                <div class="c-8">
                    <div class="text-center">                    
                        <?php require_once('views/component/alert.php') ?>
                        <h1 class="color-primary" style="font-family: 'Josefin Sans', sans-serif;" style="margin-bottom: 40px;">
                            <?php if ($main['profile']['judul'] == $single['judul']): ?>
                                Gallery
                            <?php else: ?>
                                <?= $single['judul'] ?>
                            <?php endif ?>                    
                        </h1>
                        <div class="line color-primary"></div>
                    </div>
                    <?php require_once('views/inc/breadcrumb.php') ?>
                    <!-- list content -->
                    <div class="row">
                        <?php require_once('views/component/list_gallery.php') ?>                
                        <div class="col-12 text-center" style="display: flex;">
                            <?= $list['paging'] ?>
                        </div>
                    </div>
                </div>                 
                <?php require_once('views/inc/sidebar.php') ?>
            </div>
        </div>