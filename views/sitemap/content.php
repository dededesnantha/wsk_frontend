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
<?php endif ?>
</urlset>