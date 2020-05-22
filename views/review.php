       <script src='https://www.google.com/recaptcha/api.js'></script> 
    <?php require_once('views/component/script_ratting.php') ?>
    <?php require_once('views/component/script_review.php') ?>

        <!-- content -->
        <div class="container">            
            <div class="row">
                <div class="c-8" style="padding-top: 50px">                    
                    <?php require_once('views/component/alert.php') ?>
                     <?php require_once('views/inc/breadcrumb.php') ?>
                     <div class="text-center">
                        <h1 class="color-primary" style="font-family: 'Josefin Sans', sans-serif;" style="margin-bottom: 40px;">
                           Review            
                        </h1>
                    </div>
                    <div class="line color-primary"></div>
                    <!-- list content -->
                    <div class="row">
                        <?php require_once('views/component/review.php') ?>                
                        <?php require_once('views/component/list_review.php') ?>                
                        <div class="col-12 text-center" style="display: flex;">
                            <?= $list['paging'] ?>
                        </div>
                    </div>                
                </div>                 
                <?php require_once('views/inc/sidebar.php') ?>
            </div>
        </div>