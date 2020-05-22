          <div class="list-comment">            
            <?php if ($comment): ?>
              
            <h3><a>Comment : </a></h3>               
            <?php foreach ($comment as $row1): ?>                    
            <div class="comment comment-parent ">
              <h3 class="title"><a><?= $row1['name'] ?></a></h3>              
              <?php if ($row1['user']): ?>            
              <span class="email">
                (<?= $row1['email'] ?>)
              </span>
              <?php endif ?>            
              
              <?php if (!$row1['user']): ?>                
                <a><span class="label">Admin Reply</span></a>
              <?php endif ?>
              
              <div class="date">
                <?= $row1['created_at'] ?>
              </div>
              <div class="message">
                <?= $row1['message'] ?>
              </div>            
              

            </div>              
              <?php foreach ($row1['child'] as $row2): ?>
              <div class="comment comment-child" style="">
               <h3 class="title"><a>{{ $row2['name'] }}</a></h3>
                <?php if ($row1['user']): ?>            
                <span class="email">
                  (<?= $row2['email'] ?>)
                </span>
                <?php endif ?> 
                <?php if (!$row2['user']): ?>                
                  <a><span class="label">Admin Reply</span></a>
                <?php endif ?>
                <div class="date">
                  <?= $row2['created_at'] ?>
                </div>
                <div class="message">
                  <?= $row2['message'] ?>
                </div>
              </div>
          
              <?php endforeach ?>
            <?php endforeach ?>
            <?php endif ?>

          </div>
          <section  style="margin: 10px 0px;background: #F2F3F5;border: 1px solid #dddf;border-radius: 3px;"> 
           <div class="Booking">
                <h4 class="font-secondary">Send Comment :</h4>
              </div>
              <div class="p-3">  
              <form action="<?= base_url('comment/'.$param.'/'.$single['slug']) ?>" method="post" accept-charset="utf-8">
                <div class="row">
                  <div class="form-group c-6">
                    <label>Name : </label>
                    <input type="text" name="name" class="form-control" required="">
                  </div>
                  <div class="form-group c-6">
                    <label>Email : </label>
                    <input type="email" name="email" class="form-control" required="">
                  </div>
                </div>
                <div class="form-group">
                  <label>Message : </label>            
                  <textarea name="message" class="form-control" required=""></textarea>
                </div>
                <div class="form-group">
                  <button type="submit" class="button-primary bg-primary color-white" style="font-weight: 500;"> 
                    <span class="">Send Comment</span></button>
                  </div>
                </form>
              </div>
            </section>