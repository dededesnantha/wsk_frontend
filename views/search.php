        <!-- content -->
        <div class="container">            
            <div class="row">
                <div class="c-8">                    
                    <?php require_once('views/component/alert.php') ?>
                    <?php require_once('views/inc/breadcrumb.php') ?>
                    <section  style="margin: 10px 0px;background: #F2F3F5;border: 1px solid #dddf;border-radius: 3px;">
                    <h1 class="font-secondary color-primary" style="font-size: 32px"><b>Result Search</b></h1>
                    </section>
                    <!-- list content -->
                    <section  style="margin: 10px 0px;background: #F2F3F5;border: 1px solid #dddf;border-radius: 3px;">
                    <div class="row">
                        <?php require_once('views/component/list_product.php') ?>                
                        <div class="col-12 text-center" style="display: flex;">
                            <?= $list['paging'] ?>
                        </div>
                    </div> 
                    </section>               
                </div>                 
                <?php require_once('views/inc/sidebar-blog.php') ?>
            </div>
        </div>
    </div>