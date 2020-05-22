            <ul class="list-group-service list-group-flush p-0">
                <div class="row">
                	<?php foreach ($list['data'] as $row): ?>                	
                    <div class="c-6 card-4" style="margin-bottom:20px;"> 
                        <div class="m-1">
                        	<a href="<?= AWS_PATH.'gallery/'.$row['gambar'] ?>">                        	
                            	<img src="<?= AWS_PATH.'gallery/'.$row['gambar'] ?>" class="card-img-top" alt="<?= $row['judul'] ?>">
                        	</a>
                        </div>
                    </div>                  
                	<?php endforeach ?>
                </div>
            </ul>