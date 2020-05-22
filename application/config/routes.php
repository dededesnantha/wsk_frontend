<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// sitemap
$route['sitemap.xsl'] = 'SitemapController/layout';
$route['sitemap.xml'] = 'SitemapController/home';

$route['pengumuman.xml'] = 'SitemapController/pengumuman';
$route['tour-sitemap.xml'] = 'SitemapController/product';
$route['page-sitemap.xml'] = 'SitemapController/page';
$route['category-sitemap.xml'] = 'SitemapController/category';
$route['blog-sitemap.xml'] = 'SitemapController/category';
$route['tag-sitemap.xml'] = 'SitemapController/blog';
$route['blog-category-sitemap.xml'] = 'SitemapController/blog_category';


// pengumuman
$route['default_controller'] = 'ViewController/index';
$route['pengumuman/:any'] = 'ViewController/single_pengumuman';
