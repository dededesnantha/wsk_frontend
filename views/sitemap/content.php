<?php
	echo '<?xml version="1.0" encoding="UTF-8" ?> ';
?>
<?php

	echo '<?xml-stylesheet type="text/xsl" href="'. base_url("sitemap.xsl") .'"?>';
?>
<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php if (@$status == 'page'): ?>
	
	<url>
		<loc><?= base_url() ?></loc>
		<lastmod><?=  str_replace(' ', 'T', date("Y-m-d h:m:sP", strtotime(date("Y-m-d H:i:s",mktime(0,0,0))))) ?></lastmod>		
	</url>
	<url>
		<loc><?= base_url('gallery.html') ?></loc>
		<lastmod><?=  str_replace(' ', 'T', date("Y-m-d h:m:sP", strtotime(date("Y-m-d H:i:s",mktime(0,0,0))))) ?></lastmod>		
	</url>
	<url>
		<loc><?= base_url('contact.html') ?></loc>
		<lastmod><?=  str_replace(' ', 'T', date("Y-m-d h:m:sP", strtotime(date("Y-m-d H:i:s",mktime(0,0,0))))) ?></lastmod>		
	</url>
	<url>
		<loc><?= base_url('booking.html') ?></loc>
		<lastmod><?=  str_replace(' ', 'T', date("Y-m-d h:m:sP", strtotime(date("Y-m-d H:i:s",mktime(0,0,0))))) ?></lastmod>		
	</url>
	<url>
		<loc><?= base_url('review.html') ?></loc>
		<lastmod><?=  str_replace(' ', 'T', date("Y-m-d h:m:sP", strtotime(date("Y-m-d H:i:s",mktime(0,0,0))))) ?></lastmod>		
	</url>
	<url>
		<loc><?= base_url('blog/') ?></loc>
		<lastmod><?=  str_replace(' ', 'T', date("Y-m-d h:m:sP", strtotime(date("Y-m-d H:i:s",mktime(0,0,0))))) ?></lastmod>		
	</url>
	<url>
		<loc><?= base_url('category/all') ?></loc>
		<lastmod><?=  str_replace(' ', 'T', date("Y-m-d h:m:sP", strtotime(date("Y-m-d H:i:s",mktime(0,0,0))))) ?></lastmod>		
	</url>
	<url>
		<loc><?= base_url('category') ?></loc>
		<lastmod><?=  str_replace(' ', 'T', date("Y-m-d h:m:sP", strtotime(date("Y-m-d H:i:s",mktime(0,0,0))))) ?></lastmod>		
	</url>
<?php endif ?>
<?php foreach ($load as $row): ?>	
	<url>
		<loc><?= $site_url.$row['slug'] ?></loc>
		<lastmod><?= str_replace(' ', 'T', date("Y-m-d h:m:sP", strtotime($row['updated_at']))) ?></lastmod>
<?php if ($image == true): ?>	
		<image:image>
			<image:loc><?= $image_url.$row['gambar'] ?></image:loc>
			<image:title><![CDATA[ <?= $row['judul'] ?> ]]></image:title>
			<image:caption><![CDATA[ <?= $row['judul'] ?> ]]></image:caption>
		</image:image>
<?php endif ?>
	</url>
<?php endforeach ?>
</urlset>