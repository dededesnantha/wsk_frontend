    <?php if ($main['blok_booking']): ?>
        <script src='https://www.google.com/recaptcha/api.js'></script>
    <?php endif ?>
        <script src="{{asset('front/template2')}}/jquery-3.1.1.min.js" type="text/javascript" ></script>
        <script>
            $(document).ready(function() {

                $('#add').click(function() {
                    $('#input_add').append('<div class="form-group" id="input_add" style="margin-top: 10px"><input class="form-control" id="custom" name="custom_tour[]" type="text" placeholder="Your Tour" ></div>');
                });
            });
        </script>

        <!-- content -->
        <div class="container">            
            <div class="row">
                <div class="c-8" style="padding-top: 50px">
                    <div class="text-center">                    
                        <?php require_once('views/component/alert.php') ?>
                        <h1 class="color-primary" style="font-family: 'Josefin Sans', sans-serif;">
                            <?= $main['label']['Booking Your Tour'] ?> 
                        </h1>
                        <?php require_once('views/inc/breadcrumb.php') ?>
                    </div>                            
                    <form action="<?= base_url('booking') ?>" method="POST"  enctype="multipart/form-data">
                        <div class="mb-5 margin-bottom">
                            <h2 class="font-secondary" style="font-weight: 500"><?= $main['label']['Select Tour'] ?> : </h2>
                            <div>

                                <?php foreach ($product as $key): ?>
                                    <?php if ($key['data'] != null): ?>
                                        <div class="tab">
                                          <input id="<?= $key['slug'] ?>" type="checkbox" name="tabs" class="acordion" <?php if($key['slug'] == @$_SESSION['category']): echo 'checked' ;endif ?>>
                                          <label class="label" for="<?= $key['slug'] ?>"><?= $key['name'] ?></label>
                                          <div class="tab-content">                                            
                                            <?php foreach ($key['data'] as $row): ?>                                            
                                              <p><input type="checkbox" value="<?= $row['judul'] ?>" name="tour[]" <?php if($row['judul'] == @$_SESSION['tour']): echo 'checked' ;endif ?> > <span><?= $row['judul'] ?></span></p>
                                            <?php endforeach ?>                                        
                                          </div>
                                        </div>    
                                    <?php endif ?>
                                <?php endforeach ?>                           
                            </div>
                        </div>

                        <div class="m-12 margin-bottom">
                            <h2 class="font-secondary" style="font-weight: 500"><?= $main['label']['Or Custom Tour'] ?> : </h2>
                            <div id="input_add">                              
                                <div class="form-group">
                                    <input type="text"
                                            class="form-control"                                            
                                            id="custom" 
                                            name="custom_tour[]" 
                                            type="text" 
                                            placeholder="Your Tour">
                                </div>
                            </div>
                            <div class="form-group text-right">
                                <button class="button-primary bg-primary color-white pull-right" id="add" type="button" style="font-family: 'Josefin Sans', sans-serif;"><?= $main['label']['Add Tour'] ?></button>  
                            </div>                          
                        </div>    


                            <div class="c-12" style="margin-top: 100px">
                                        <h2 class="font-secondary" style="font-weight: 500"><?= $main['label']['Send Booking'] ?> : </h2>

                                        <div class="c-12">
                                            <div class="form-group">
                                                <div class="form-inline text-left">
                                                    <div class="mr-4">                                        
                                                        <input type="radio" name="initials" value="Mr." required> Mr.
                                                    </div>           
                                                    <div class="mr-4">
                                                        <input type="radio" name="initials" value="Mrs." required> Mrs.                                    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="c-6">
                                                <div class="form-group">
                                                    <label><?=  $main['label']['First Name'] ?></label>
                                                    <input type="text"
                                                    class="form-control"                                        
                                                    placeholder="<?=  $main['label']['First Name'] ?>" 
                                                    required="" 
                                                    name="first_name">
                                                </div>
                                            </div>
                                            <div class="c-6">
                                                <div class="form-group">
                                                    <label><?=  $main['label']['Last Name'] ?></label>
                                                    <input type="text"
                                                    class="form-control"                                        
                                                    placeholder="<?=  $main['label']['Last Name'] ?>" 
                                                    required="" 
                                                    name="last_name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <label><?=  $main['label']['Your Email'] ?></label>
                                                <input type="email"
                                                class="form-control"                                        
                                                placeholder="<?=  $main['label']['Your Email'] ?>" 
                                                required="" 
                                                name="email">
                                            </div>
                                        </div>                    
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <label><?=  $main['label']['Your Phone Number'] ?></label>
                                                <input type="Number"
                                                class="form-control"                                        
                                                placeholder="<?=  $main['label']['Your Phone Number'] ?>" 
                                                required="" 
                                                name="phone">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="c-6">
                                                <div class="form-group">
                                                    <label for="date">Date</label>
                                                    <input type="date"
                                                    class="form-control"                                        
                                                    placeholder="Date" 
                                                    required=""
                                                    name="tanggal"
                                                    value="<?php if(isset($_SESSION['tanggal'])): echo $_SESSION['tanggal']; endif ?>">
                                                </div>
                                            </div>
                                            <div class="c-3">
                                                <div class="form-group">
                                                    <label><?=  $main['label']['Adult'] ?></label>
                                                    <select class="form-control"                                            
                                                    required="" 
                                                    name="adult">
                                                    <option value="">-- <?= $main['label']['Adult'] ?> --</option>
                                                    <?php for ($i = 1;$i < 21;$i++) { ?>
                                                        <option value="<?= $i ?>" <?php if (isset($_SESSION['adult']) && $_SESSION['adult'] == $i):echo "selected"; endif ?>>
                                                            <?= $i ?>
                                                        </option>
                                                    <?php } ?>                                        
                                                </select>
                                            </div>
                                        </div>
                                        <div class="c-3">
                                            <div class="form-group">
                                                <label><?=  $main['label']['Child'] ?></label>
                                                <select class="form-control"                                            
                                                required="" 
                                                name="child">
                                                <option value="">-- <?= $main['label']['Child'] ?> --</option>
                                                <?php for ($i = 1;$i < 21;$i++) { ?>
                                                    <option value="<?= $i ?>" <?php if (isset($_SESSION['child']) && $_SESSION['child'] == $i):echo "selected"; endif ?>>
                                                        <?= $i ?>
                                                    </option>
                                                <?php } ?>                                        
                                            </select>
                                        </div>
                                    </div>
                                </div>                

                                <div class="c-12">
                                    <div class="form-group">
                                        <label><?= $main['label']['Message'] ?></label>
                                        <textarea                                     
                                        cols="30" 
                                        rows="5" 
                                        class="form-control"
                                        placeholder="<?= $main['label']['Message'] ?>"
                                        name="deskripsi"></textarea>
                                    </div>
                                </div>
                            </div>

                        <div class="row mb-5">
                            <div class="form-group c-12">
                                <h2 class="font-secondary" style="font-weight: 500"><?= $main['label']['Pick Up Information'] ?> : </h2>
                            </div>
                                <div class="c-6">
                                    <div class="form-group">
                                        <label><?=  $main['label']['Pick Up Point'] ?></label>
                                        <input type="text"
                                                class="form-control"                                        
                                                placeholder="<?=  $main['label']['Pick Up Point'] ?>"                                            
                                                name="pick_up_point">
                                    </div>
                                </div>
                                <div class="c-6">
                                    <div class="form-group">
                                        <label><?=  $main['label']['Your Hotel Stay'] ?></label>
                                        <input type="text"
                                                class="form-control"                                        
                                                placeholder="<?=  $main['label']['Your Hotel Stay'] ?>"                                            
                                                name="hotel">
                                    </div>
                                </div>
                                <div class="c-6">
                                    <div class="form-group">
                                        <label><?=  $main['label']['Hotel Phone Number'] ?></label>
                                        <input type="text"
                                                class="form-control"                                        
                                                placeholder="<?=  $main['label']['Hotel Phone Number'] ?>"
                                                name="hotel_phone">
                                    </div>
                                </div>
                                <div class="c-6">
                                    <div class="form-group">
                                        <label><?=  $main['label']['Hotel Room Number'] ?></label>
                                        <input type="text"
                                                class="form-control"                                        
                                                placeholder="<?=  $main['label']['Hotel Room Number'] ?>"
                                                name="hotel_room_number">
                                    </div>
                                </div>
                            <div class="c-12">
                                <div class="form-group">
                                    <label><?=  $main['label']['Your Address / Hotel Address'] ?></label>
                                    <input type="text"
                                            class="form-control"                                        
                                            placeholder="<?=  $main['label']['Your Address / Hotel Address'] ?>"
                                            name="address">
                                </div>
                            </div>

                            <?php if ($main['blok_booking']): ?>                            
                            <div class="col-lg-12 col-md-12 ">
                                <div class="form-group">
                                    <div class="g-recaptcha" data-sitekey="<?= CAPCHA_KEY ?>"></div>
                                </div>
                            </div>
                            <?php endif ?>

                            <div class="c-12 ">
                                <div class="">                                
                                   <button class="button-primary bg-primary color-white pull-right" type="submit" style="padding: 5px 20px;font-family: 'Josefin Sans', sans-serif;"><?= $main['label']['Submit'] ?></button>
                                </div>
                            </div>                            

                        </div>
                    </form>
                    
                </div>                 
                <?php require_once('views/inc/sidebar.php') ?>
            </div>
        </div>