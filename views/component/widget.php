        <?php foreach ($widget as $row): ?>       
          <div  style="border:1px solid #efefef;margin-top: 20px;font-size: 15px">
            <div style="background: #EFEFEF;text-align: center"><h4 id="<?= str_replace(' ','_',$row['name']) ?>" style="margin-top: 0;color:#000;padding: 3px"><?= $row['name'] ?></h4></div>
            <div style="padding: 0 0.5rem">
              <?= $row['description'] ?>
            </div>
          </div>        
        <?php endforeach ?>