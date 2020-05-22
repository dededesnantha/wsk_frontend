<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// sitemap
$route['sitemap.xsl'] = 'SitemapController/layout';
$route['sitemap.xml'] = 'SitemapController/home';

$route['tour-sitemap.xml'] = 'SitemapController/product';
$route['page-sitemap.xml'] = 'SitemapController/page';
$route['category-sitemap.xml'] = 'SitemapController/category';
$route['blog-sitemap.xml'] = 'SitemapController/category';
$route['tag-sitemap.xml'] = 'SitemapController/blog';
$route['blog-category-sitemap.xml'] = 'SitemapController/blog_category';


// pengumuman
$route['default_controller'] = 'ViewController/index';
$route['single_pengumuman/:any'] = 'ViewController/single_pengumuman';





$route['link/:any'] = 'ViewController/single_product';
$route['category'] = 'ViewController/list_product';
$route['category/:any'] = 'ViewController/list_product';
$route['blog'] = 'ViewController/blog';
$route['blog/list'] = 'ViewController/blog_lis';
$route['blog/:any'] = 'ViewController/single_blog';
$route['blog/category/:any'] = 'ViewController/list_blog';
$route['tag/:any'] = 'ViewController/list_tag';
$route['gallery.html'] = 'ViewController/list_gallery';
$route['gallery/:any'] = 'ViewController/list_gallery';
$route['search'] = 'ViewController/search';
$route['contact.html'] = 'ViewController/contact';
$route['booking.html'] = 'ViewController/booking';
$route['review.html'] = 'ViewController/review';

$route['clear-cache'] = 'ViewController/clear';

//post
$route['contact']['POST'] = 'ViewController/contact_send';
$route['booking']['POST'] = 'ViewController/booking_send';
$route['single_booking']['POST'] = 'ViewController/single_send';
$route['home_booking']['POST'] = 'ViewController/home_send';
$route['give_review/:any']['POST'] = 'ViewController/post_review';
$route['comment/:any/:any']['POST'] = 'ViewController/comment';

$route['contact-wa/:any'] = 'ViewController/records_wa';
$route[':any'] = 'ViewController/single_page';



$route['gambar/(:any)/(:any)'] = 'Main/ImageManipulationController/index';
$route['galeri/(:any)/(:any)'] = 'Main/ImageManipulationController/index';
$route['media/(:any)/(:any)'] = 'Main/ImageManipulationController/index';

$route['404_override'] = 'ViewController/page_not_found';
$route['translate_uri_dashes'] = FALSE;
