            <div class="c-4 p-0">
                
                <div style="margin: 10px 0px;background: #F2F3F5;border: 1px solid #dddf;border-radius: 3px; padding: 10px 20px">
                     <div class="container" style="position: absolute;z-index: -1"></div>
                    <?php foreach ($sidebar as $row): ?>    
                        <?php if ($row['role'] == 1): ?>
                            <div class="p-1 color-primary" style="margin-bottom: 10px">
                                <?php if ($row['judul']): ?>                                
                                <div class="card-body-1 mt-4">
                                    <h2 class="font-secondary" style="margin: 0;">
                                        <b><?= $row['judul'] ?></b>                    
                                  </h2>
                                </div>
                                <?php endif ?>
                                <div>
                                    <?php foreach ($main['social_media'] as $social_media): ?>
                                        <a href="<?= $social_media['link'] ?>" title="<?= $social_media['title'] ?>">
                                            <img src="<?= $social_media['img'] ?>" alt="<?= $social_media['title'] ?>" width="40px">
                                        </a>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        <?php elseif($row['role'] == 2): ?>
                            <div class="p-1 color-primary" style="margin-bottom: 10px">
                                <?php if ($row['judul']): ?>                                
                                <div class="card-body-1">
                                    <ul class=" p-0 m-0" style="list-style-type: none;">
                                        <li style="padding: 10px 0;">
                                            <a href="#" style="text-decoration: none; color: #3498db;font-family: 'Lato', sans-serif;"><?= $row['judul'] ?></a>
                                        </li>
                                    </ul>
                                </div>
                                <?php endif ?>
                                <div>
                                    <?php foreach ($main['contact'] as $contacts): ?>                                      
                                      <span style="background: #e6e6e6;padding: 5px 10px;display: block;border-bottom: 1px solid #cecece;border-radius: 2px;box-shadow: 0 0.5px 0.5px rgba(200,200,200,0.7);margin-bottom: 3px;"> 
                                        <?php if ($contacts['role'] != 0): ?>
                                            <?php if (!$contacts['image_null']): ?>
                                                <img src="<?= $contacts['img'] ?>" alt="<?= $contacts['title'] ?>" width="25px">
                                            <?php endif ?>
                                            <span><?= $contacts['title'] ?> : <a href="<?= $contacts['link'] ?>" title="<?= $contacts['title'] ?>" target="_blank"><?= $contacts['id'] ?></a></span>                                        
                                        <?php else: ?>
                                            <?php if (!$contacts['image_null']): ?>
                                                <img src="<?= $contacts['img'] ?>" alt="<?= $contacts['title'] ?>" width="25px">
                                            <?php endif ?>
                                            <span style="position: relative;bottom: 3px;margin: 0 5px;"><?= $contacts['title'] ?> : <span><?= $contacts['id'] ?></span></spa>
                                        <?php endif ?>                                    
                                      </span>
                                    <?php endforeach ?>                            
                                </div>
                            </div>
                        <?php elseif($row['role'] == 3): ?>
                            <div class="p-1" style="margin-bottom: 10px">             
                                <a href="<?= base_url('/') ?>" title="<?= $main['profile']['judul'] ?>">
                                    <img src="<?= base_url('image').'/'.$main['profile']['logo'] ?>" alt="logo" style="max-height:75px">
                                </a>
                            </div>

                        <?php elseif($row['role'] == 4): ?>
                            <div class="p-1" style="margin-bottom: 10px">
                                <?php if ($row['judul']): ?>                                
                                <div class="card-body-1 mt-4">
                                    <h2 class="font-secondary" style="margin: 0">
                                        <b><?= $row['judul']?></b>
                                  </h2>
                                </div>
                                <?php endif ?>
                                <div>
                                    <article>
                                        <?= $main['profile']['deskripsi'] ?>
                                    </article>
                                </div>
                            </div>

                        <?php elseif($row['role'] == 5): ?>
                            <div class="p-1 color-primary" style="margin-bottom: 10px">
                                <?php foreach ($row['data'] as $item): ?>
                                    <div style="position: relative;border-radius: 2px;overflow: hidden;margin-bottom: 10px;">
                                        <img src="<?= base_url('image').'/'.$item['gambar'] ?>" alt="<?= $item['judul'] ?>" style="display: block;">
                                        <a href="<?= base_url('category/'.$item['slug']) ?>" title="<?= $item['judul'] ?>" style="position: absolute;bottom: 0;padding: 0;height: 100%;width: 100%;display: flex;background: rgba(0,0,0,0.2);">
                                            <span style="font-size: 15.5px;background: rgba(0,0,0,0.7);padding: 5px 10px;margin: 10px auto auto 10px;border-radius: 5px;color: #eee;"><?= $item['judul'] ?></span>
                                        </a>
                                    </div>
                                <?php endforeach ?>
                            </div>    
                        <?php elseif($row['role'] == 7): ?>
                            <div class="p-1 color-primary" style="margin-bottom: 10px">
                                <?php if ($row['judul']): ?>                                
                                <div class="card-body-1 mt-4">
                                    <h2 class="font-secondary" style="margin: 0">
                                        <b><?= $row['judul'] ?></b>
                                    </h2>
                                </div>
                                <?php endif ?>
                                <ul class=" p-0 m-0" style="padding: 0;list-style: none;margin-top: 2px">  
                                    <?php foreach ($row['data'] as $item ): ?>
                                    <li style="padding: 10px 0;">
                                            <a href="<?= $item['link'] ?>" title="<?= $item['title'] ?>" style="text-decoration: none; color: #3498db;font-family: 'Lato', sans-serif;" >
                                                <?= $item['title'] ?>
                                            </a>
                                    </li>
                                    <?php endforeach ?>
                                    <hr class="m-0" style="border-bottom: 0.1px solid #e3e3e3">
                                </ul>
                            </div>

                        <?php elseif($row['role'] == 8): ?>
                            <div class="p-1 color-primary" style="margin-bottom: 10px">
                                <?php if ($row['judul']): ?>                                
                                <div class="card-body-1 mt-4">
                                    <h2 class="font-secondary" style="margin: 0">
                                        <b><?= $row['judul'] ?></b>                  
                                    </h2>
                                </div>
                                <?php endif ?>
                                <ul class=" p-0 m-0" style="padding: 0;list-style: none;margin-top: 2px"> 
                                    <?php foreach ($main['menu'] as $key): ?>                                     
                                    <?php if ($key['link'] != 'kategori'): ?>
                                   <li style="padding: 10px 0;">
                                            <a href="<?= $key['link'] ?>" title="<?= $key['judul'] ?>" style="text-decoration: none; color: #3498db;font-family: 'Lato', sans-serif;">
                                                <?= $key['judul'] ?>
                                            </a>
                                    </li>
                                    <?php endif ?>                                   
                                    <hr class="m-0" style="border-bottom: 0.1px solid #e3e3e3">
                                    <?php endforeach ?>
                                </ul>
                            </div>                    
                        <?php elseif($row['role'] == 10): ?>
                           <div class="p-1 color-primary" style="margin-bottom: 10px">
                                <?php if ($row['judul']): ?>                                
                                <div class="card-body-1 mt-4">
                                   <h2 class="font-secondary" style="margin: 0">
                                        <b><?= $row['judul'] ?></b>                  
                                    </h2>
                                </div>
                                <?php endif ?>
                                <ul class=" p-0 m-0" style="padding: 0;list-style: none;margin-top: 2px">
                                    <?php foreach ($row['data'] as $item): ?>
                                    <li style="padding: 10px 0;">
                                            <a href="<?= base_url('blog/'.$item['slug']) ?>" title="<?= $item['judul'] ?>" style="text-decoration: none; color: #3498db;font-family: 'Lato', sans-serif;">
                                               <?= $item['judul'] ?>
                                            </a>
                                    </li>
                                    <?php endforeach ?>
                                </ul>
                            </div> 
                        <?php elseif($row['role'] == 11): ?>
                            <?php if (trim($main['profile']['map']) != ''): ?>                                
                                <div class="p-1 color-primary" style="margin-bottom: 10px">
                                    <?php if ($row['judul']): ?>                                
                                    <div class="card-body-1 mt-4">
                                        <h2 class="font-secondary" style="margin: 0">
                                           <b><?= $row['judul'] ?></b>
                                        </h2>
                                    </div>
                                    <?php endif ?>
                                    <div style="max-height: 300px; overflow: hidden;">
                                        <?= $main['profile']['map']; ?>                                
                                    </div>
                                </div>
                            <?php endif ?>
                        <?php elseif($row['role'] == 12): ?>
                            <div class="p-1 color-primary" style="margin-bottom: 10px">
                                <?php if ($row['judul']): ?>                                
                                <div class="card-body-1 mt-4">
                                   <h2 class="font-secondary" style="margin: 0">
                                        <b><?= $row['judul'] ?></b>                    
                                    </h2>
                                </div>
                                <?php endif ?>
                                <ul class=" p-0 m-0" style="padding: 0;list-style: none;margin-top: 2px">
                                    <?php foreach ($row['data'] as $item): ?>
                                    <li style="padding: 10px 0;">
                                            <a href="<?= base_url('blog/'.$item['slug']) ?>" title="<?= $item['judul'] ?>" style="text-decoration: none; color: #3498db;font-family: 'Lato', sans-serif;">
                                                <?= $item['judul'] ?>
                                            </a>
                                    </li>                                    
                                    <hr class="m-0" style="border-bottom: 0.1px solid #e3e3e3">
                                    <?php endforeach ?>
                                </ul>
                            </div>                    
                        <?php elseif($row['role'] == 13): ?>
                            <?php if ($main['profile']['tripadvisor'] != ''): ?>                                
                            <div class="p-1 color-primary" style="margin-bottom: 10px">
                                <?php if ($row['judul']): ?>                                
                                <div class="card-body-1 mt-4">
                                    <h2 class="font-secondary" style="margin: 0">
                                        <b><?= $row['judul']?></b>
                                    </h2>
                                </div>
                                <?php endif ?>
                                <div>
                                    <?= $main['profile']['tripadvisor']; ?>                                                
                                </div>
                            </div>
                            <?php endif ?>
                        <?php elseif($row['role'] == 14): ?>
                            <?php foreach ($row['data'] as $key): ?>
                                <?php if ($key['data'] != null): ?>
                                    <div class="p-1 color-primary" style="margin-bottom: 10px">
                                        <div class="card-body-1 mt-4">
                                            <h2 class="font-secondary" style="margin: 0">
                                                <b><?= $key['name'] ?></b>
                                            </h2>
                                        </div>
                                        <ul class=" p-0 m-0" style="padding: 0;list-style: none;margin-top: 2px">
                                            <?php foreach ($key['data'] as $rows): ?>
                                            <li style="padding: 10px 0;">
                                                    <a href="<?= base_url('link/'.$rows['slug']) ?>" title="<?= $rows['judul'] ?>" style="text-decoration: none; color: #3498db;font-family: 'Lato', sans-serif;">
                                                          <?= $rows['judul'] ?>
                                                    </a>
                                              </li>
                                              <hr class="m-0" style="border-bottom: 0.1px solid #e3e3e3">
                                            <?php endforeach ?>
                                        </ul>
                                    </div>
                                <?php endif ?>
                            <?php endforeach ?>                            
                        <?php elseif($row['role'] == 15): ?>
                            <?php if (!empty($row['data'])): ?>                                
                                <div class="p-1 color-primary" style="margin-bottom: 10px">
                                    <?php if ($row['judul']): ?>                                
                                    <div class="card-body-1 mt-4">
                                        <p class="font-secondary p-0">
                                            Patner                      
                                        </p>
                                    </div>
                                    <?php endif ?>
                                    <div class="card-body-1">
                                        <?php foreach ($row['data'] as $rows): ?>
                                            <button type="submit" class="btn btn-light">
                                                <a href="<?= $rows['link'] ?>" title="<?= $rows['judul'] ?>"><?= $rows['judul'] ?></a></button>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                            <?php endif ?>
                        <?php endif ?>
                    <?php endforeach ?>
                </div>
            </div>
                   