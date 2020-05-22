        <?php if (count($web_review) != 0): ?>            
        <section style="margin-bottom:40px;">        
            <div class="w3-light-grey w3-card-2" style="bottom: 15px;position: relative;">
                <h3 style="text-align: left;padding-left: 30px">Review</h3>
            </div>
            <?php foreach ($web_review as $item): ?>            
                <article class="w3-row-padding">
                    <div class="w3-col l12 m12 w3-margin-bottom" style="border-bottom: 1px solid #eee;">
                        <div class="w3-display-container">
                            <div class="w3-padding">
                                <div class="w3-col" style="margin-bottom: 15px;">
                                    <div class="w3-left-align" style="display: inline-flex;">
                                        <?php for ($i = 0; $i < (int)$item['count']; $i++) { ?>
                                            <img src="<?= base_url('asset/star.ico') ?>" alt=" " style="width: 20px;">
                                        <?php } ?>                                    
                                        <?php for ($i = 0; $i < (5- (int)$item['count']); $i++) { ?>
                                            <img src="<?= base_url('asset/star_b.ico') ?>" alt=" " style="width: 20px;">
                                        <?php } ?>                                                                                
                                    </div>                                    

                                    <small style="color: #545454;"><i><?= $item['filter_created_at'] ?></i></small>
                                    <h3 style="margin:5px 3px;2px 3px"><?= $item['subject'] ?></h3>
                                    <div style="margin-bottom:5px;margin-left:3px;">
                                        <small>From : </small><small itemprop="author"><?= $item['name'] ?></small>                                
                                    </div>
                                    <div style="font-size: 13.5px;padding-left: 3px;line-height: 1.7;">                                
                                        <?= $item['message'] ?>
                                    </div>                                
                                </div>
                            </div> 
                        </div>            
                    </div>
                </article>                    
            <?php endforeach ?>        
            <center class="w3-row-padding">                    
                <?php if ($list == 'paging'): ?>
                    <?= $list['paging'] ?>                    
                <?php else: ?>
                    <a href="<?= base_url('review.html') ?>" title="review" class="w3-button w3-black">
                        Show More Review 
                    </a>
                <?php endif ?>                        
            </center>
        </section>
        <?php endif ?>        