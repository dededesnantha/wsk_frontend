            <script src='https://www.google.com/recaptcha/api.js'></script>
        <!-- content -->
        <div class="container">            
            <div class="row">
                <div class="c-8">                    
                    <?php require_once('views/component/alert.php') ?>
                    <h1 class="card-title " style="margin-bottom: 40px;">
                       <?= $optiomation['sitename'] ?>                               
                    </h1>
                    <?php require_once('views/inc/breadcrumb.php') ?>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12 p-0 pl-md-3 pr-md-3">
                            <div class="mb-3">                                
                                <a href="<?= base_url('/') ?>" title="<?= $main['profile']['judul'] ?>">
                                  <img src="<?= AWS_PATH.'image/'.$main['profile']['logo'] ?>" alt="logo" style="max-width:100%;">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-4 p-0 pl-md-3 pr-md-3">
                            <div class="text-contact mb-1" style="margin-left: 30px">
                                <span class="list-group-item" style="color: slategrey"> <?= $main['label']['Address'] ?> : <?= $main['profile']['alamat'] ?></span>
                            </div>                            
                            <?php foreach ($main['contact'] as $row): ?>    
                                <div class="text-contact mb-1" style="margin-left: 30px">
                                    <span class="list-group-item" style="color: slategrey"> 
                                        <?php if ($row['img'] != ''): ?>
                                            <img src="<?= $row['img'] ?>" alt="<?= $row['title'] ?>" width="30px">
                                        <?php endif ?>
                                        <?= $row['title'] ?> : <?= $row['id'] ?>
                                    </span>
                                </div>
                            <?php endforeach ?>
                            <hr>
                            <?php foreach ($main['social_media'] as $social_media): ?>
                                <a href="<?= $social_media['link'] ?>" title="<?= $social_media['title'] ?>">
                                  <img src="<?= $social_media['img'] ?>" alt="<?= $social_media['title'] ?>" width="40px">
                                </a>
                            <?php endforeach ?>                                                    
                        </div>                        
                        <?php if (trim($main['profile']['map']) != ''): ?>                        
                        <div class="col-12">
                            <?= $main['profile']['map'];  ?>
                        </div>
                        <?php endif ?>                    
                    </div>
                    <hr>
                    <div class="Booking" style="margin-top:40px;">
                        <h2 class="font-secondary p-1" style="border-left: 5px solid #11A0E9;font-weight: 500"><?= $main['label']['Send Message'] ?></h2>
                    </div>
                    <form action="<?= base_url('contact') ?>" method="POST">
                        <div class="row">
                            <div class="c-6">
                                <div class="form-group">
                                    <label>Firt Name</label>
                                    <input type="text"
                                            class="form-control"                                        
                                            placeholder="<?= $main['label']['First Name'] ?>"
                                            name="name">
                                </div>
                            </div>
                            <div class="c-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" 
                                            class="form-control"
                                            placeholder="<?= $main['label']['Last Name'] ?>"
                                            name="last_name">
                                </div>
                            </div>
                            <div class="c-6">
                                <div class="form-group">
                                    <label>Your Email</label>
                                    <input type="email" 
                                            class="form-control" 
                                            placeholder="<?= $main['label']['Your Email'] ?>"
                                            name="email">
                                </div>
                            </div>
                            <div class="c-6">
                                <div class="form-group">
                                    <label>Subject</label>
                                    <input type="text" 
                                        class="form-control"
                                        placeholder="<?= $main['label']['Subject'] ?>"
                                        name="subject">
                                </div>
                            </div>
                            <div class="c-12">
                                <div class="form-group">
                                    <label>Massage</label>
                                    <textarea                                     
                                        cols="30" 
                                        rows="10" 
                                        class="form-control"
                                        placeholder="<?= $main['label']['Message'] ?>"
                                        name="message">
                                    </textarea>
                                </div>
                            </div>
                            <div class="c-12 ">
                                <div class="form-group">
                                    <div class="g-recaptcha" data-sitekey="<?= CAPCHA_KEY ?>"></div>
                                </div>
                            </div>
                            <div class="c-12 ">
                                <button class="button-primary bg-primary color-white" type="submit" style="padding: 5px 20px;font-family: 'Josefin Sans', sans-serif;"><?= $main['label']['Send Message'] ?></button>
                            </div>
                        </div>
                    </form>
                    
                </div>                 
                <?php require_once('views/inc/sidebar.php') ?>
            </div>
        </div>