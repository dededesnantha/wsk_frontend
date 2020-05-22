        <?php if ($row['judul'] != ''): ?>      
            <h3 class="font-secondary color-white" style="font-size: 24.5px;font-weight: 500"><?= $row['judul'] ?></h3>
        <?php endif ?>
        <div class="slider">
            <ul>
                <?php foreach ($main['footer_slider'][$row['id_galeri_kategori']] as $key): ?>              
                    <li>
                        <img src="<?= AWS_PATH.'gallery/'.$key['gambar'] ?>" alt="<?= $key['judul'] ?>">
                    </li>
                <?php endforeach ?>           
            </ul>
        </div>
    