
        <form action="<?= base_url('give_review') ?>" method="POST">        
            <div class="row form-review">
                <div class="c-6 c-md-6 c-sm-12">
                    <div class="form-group">
                        <label for="name">Your Name : </label>
                        <input type="text" class="form-control" placeholder="your name" name="name">
                    </div>
                </div>            
                <div class="c-6 c-md-6 c-sm-12">
                    <div class="form-group">
                        <label for="email">Email : </label>
                        <input type="email" class="form-control" placeholder="your email" name="email">
                    </div>
                </div>            
                <div class="c-12 c-md-12 c-sm-12">
                    <div class="form-group">
                        <label for="subject">Subject : </label>
                        <input class="form-control" type="text" placeholder="your subject" name="subject">
                    </div>
                </div>
                <div class="c-12 c-md-12 c-sm-12">
                    <div class="form-group">                    
                        <div class="give-rating text-left" >
                            <h3 class="d-inline-block">Poin : </h3>
                            <span id="round" style="display: flex;">
                                <label for="round1" onclick="round(1)"><i class="icon-round"></i></label>
                                <label for="round2" onclick="round(2)"><i class="icon-round"></i></label>
                                <label for="round3" onclick="round(3)"><i class="icon-round"></i></label>
                                <label for="round4" onclick="round(4)"><i class="icon-round"></i></label>
                                <label for="round5" onclick="round(5)"><i class="icon-round"></i></label>
                            </span>
                        </div>

                        <input type="radio" name="count" value="1" id="round1"  hidden />
                        <input type="radio" name="count" value="2" id="round2"  hidden />
                        <input type="radio" name="count" value="3" id="round3"  hidden />
                        <input type="radio" name="count" value="4" id="round4"  hidden />
                        <input type="radio" name="count" value="5" id="round5"  hidden />

                    </div>
                </div>
                <div class="c-12 c-md-12 c-sm-12">
                    <div class="form-group">
                        <label for="message">Message : </label>                    
                        <textarea name="message" id="message" cols="2" rows="5" class="form-control"></textarea>
                    </div>
                </div>
                <div class="c-12 c-md-12 c-sm-12">
                    <br>
                    <div class="g-recaptcha" data-sitekey="<?= CAPCHA_KEY ?>"></div>
                </div>
                <div class="c-12 c-md-12 c-sm-12">
                    <div class="m-t-md" align="center">
                        <button class="button-primary bg-primary color-white" type="submit" style="padding: 5px 20px;font-family: 'Josefin Sans', sans-serif;"> <?= $main['label']['Submit'] ?></button>
                    </div>
                </div>
            </div>
        </form>