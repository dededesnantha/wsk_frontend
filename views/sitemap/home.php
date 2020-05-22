<?php
	echo '<?xml version="1.0" encoding="UTF-8" ?> ';
?>
<?php

	echo '<?xml-stylesheet type="text/xsl" href="'. base_url("sitemap.xsl") .'"?>';
?>
<sitemapindex xmlns="https://www.sitemaps.org/schemas/sitemap/0.9">
<?php foreach ($load as $row): ?>
	<sitemap>
		<loc><?= $row['loc'] ?></loc>
		<lastmod><?= str_replace(' ', 'T', date("Y-m-d h:m:sP", strtotime($row['lastmod'])))  ?></lastmod>
	</sitemap>
<?php endforeach ?>
</sitemapindex>