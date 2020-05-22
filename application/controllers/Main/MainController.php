<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainController extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('CompanyProfile');
        $this->load->model('Sidebar');        
    }
    public function main()
    {
        $array['wa'] = '';
        $array['phone'] = '';
        $array['email'] = '';
        $array['label'] = $this->CompanyProfile->label();
        $start = new DateTime();
        $end = new DateTime();
        $end->modify('+5 minutes');    
        foreach ($array['label'] as $key) {
            if ($key['description'] != '') {
                $array['label'][$key['name']] = $key['description'];
            }else{
                $array['label'][$key['name']] = $key['name'];
            }
        }
        // $array['component'] = $this->CompanyProfile->component();
        // foreach ($array['component'] as $key) {
        //     $array['component'][$key['name']] = $key['status'];
        // }

        $array['profile'] = $this->CompanyProfile->profile();
        $array['color'] = $this->CompanyProfile->WebColor();
        ///google webmaster        
        $gw = explode(' ',$array['profile']['google_webmaster']);
        $gw_status = false;    
        foreach($gw as $row){            
            if($row == 'name="google-site-verification"'){
                $gw_status = true;
                break;
            }
        }
        if (!$gw_status) {
            $array['profile']['google_webmaster'] = '';
        }
        //
        //google analistik
        $ga = explode(' ',$array['profile']['google_analytics']);
        $ga_status = false;
        foreach($ga as $row){
            if($row == "Analytics"){
                $ga_status = true;
                break;
            }    
        }
        if (!$ga_status) {
            $array['profile']['google_analytics'] = '';
        }
        //
        //facebook pixel
        $gw = explode(' ',$array['profile']['facebook_pixel']);
        $gw_status = false;
        foreach($gw as $row){
            if($row == "Facebook"){
                $gw_status = true;
                break;
            }    
        }
        if (!$gw_status) {
            $array['profile']['facebook_pixel'] = '';
        }        
        //
        //trip advisor
        $gw = explode(' ',$array['profile']['tripadvisor']);
        $gw_status = false;
        foreach($gw as $row){
            if($row == 'alt="TripAdvisor"' || $row == 'TripAdvisor' || $row == 'alt="TripAdvisor"/>'){
                $gw_status = true;
                break;
            }    
        }
        if (!$gw_status) {
            $array['profile']['tripadvisor'] = '';
        }      
        
        //
        //map
        $gw = explode(' ',$array['profile']['map']);
        $gw_status = false;
        foreach($gw as $row){
            if($row == "<iframe"){
                $gw_status = true;
                break;
            }    
        }
        if (!$gw_status) {
            $array['profile']['map'] = '';
        }      

        
        //
        // tawk
        $gw = explode(' ',$array['profile']['tawk']);
        $gw_status = false;
        foreach($gw as $row){
            if($row == "Tawk.to"){
                $gw_status = true;
                break;
            }    
        }
        if (!$gw_status) {
            $array['profile']['tawk'] = '';
        }      

        $temp = $this->CompanyProfile->menu();                
        $array['menu'] = array();
        foreach ($temp as $row) {
            if ($row['local_link'] == 1 && $row['link'] != 'kategori') {
                $row['link'] = base_url($row['link']);
                array_push($array['menu'],$row);                
            }else{
                array_push($array['menu'],$row);
            }
            $array['parent'][$row['id_parent']] = $this->CompanyProfile->menuSub($row['id_parent']);
        }        

        // contact
        $array['contact'] = $this->CompanyProfile->contact();  
        $array_contact = array();
        foreach ($array['contact'] as $row) {
            switch ($row['role']) {
                case 1:
                    $link = 'mailto:'.$row['kontak'];
                    $itemprop = '';
                    $array['email'] = $row['kontak'];
                    break;
                case 2:
                    $link = 'tel:'.$row['kontak'];
                    $itemprop = 'itemprop="telephone"';      
                    $array['phone'] = $row['kontak'];
                    break;
                case 3:
                    $link = base_url('contact-wa/'.$row['kontak']);
                    $itemprop = 'itemprop="telephone"';      
                    $array['wa'] = str_replace('+', '', $link);
                    break;
                case 4:
                    $link = $row['kontak'];
                    $itemprop = '';        
                    break;
                case 5:
                    $link = 'https://story.kakao.com/ch/'.$row['kontak'];
                    $itemprop = '';
                    break;
                case 6:
                    $link = 'viber://pa?chatURI='.$row['kontak'];
                    $itemprop = '';        
                    break;
                default:
                    $link = '';
                    $itemprop = '';
                    break;
            }
            
            $temp_contact = [
                'title' => $row['judul'],
                'img' => base_url('image').'/'.$row['gambar'],
                'link' => $link,
                'id' => $row['kontak'],
                'role' => $row['role'],
                'itemprop'=> $itemprop,
                'image_null' => $row['gambar'] == ''
            ];
            array_push($array_contact, $temp_contact);
        }
        $array['contact'] = $array_contact;

        //sosial media  
        $array['social_media'] = $this->CompanyProfile->SocialMedia();
        $array_sosial_media = array();
        foreach ($array['social_media'] as $row) {
            $temp_sosial_media = [
            'title' => $row['judul'],
            'img' => base_url('image').'/'.'image/'.$row['gambar'],
            'link' => $row['link']
            ];
            array_push($array_sosial_media, $temp_sosial_media);
        }
        $array['social_media'] = $array_sosial_media;

        // footer
        $array['menu_footer'] = $this->CompanyProfile->footer();
        $array['footer_kolom1'] = [];
        $array['footer_kolom2'] = [];
        $array['footer_kolom3'] = [];
        $footer_data = $this->CompanyProfile->footerData();
        $patner = array_map(function($n){return $n['role'];}, $footer_data);
        $index = null;
        foreach ($patner as $key => $value) {
            if ($value == 15) {
                $index = $key;
                $footer_data[$index]['data'] = array();
            }
        }

        for ($i=0; $i < count($footer_data); $i++) {        
            switch ($footer_data[$i]['role']) {
                case 1:
                    $footer_data[$i]['template'] = 'views/footer/sosial_media.php';
                    break;
                case 2:
                    $footer_data[$i]['template'] = 'views/footer/kontak.php';
                    break;
                case 3:
                    $footer_data[$i]['template'] = 'views/footer/logo.php';
                    break;
                case 4:
                    $footer_data[$i]['template'] = 'views/footer/deskripsi.php';
                    break;
                case 5:
                    $footer_data[$i]['template'] = 'views/footer/semua_kategori.php';
                    break;
                case 6:
                    $footer_data[$i]['template'] = 'views/footer/profile.php';
                    break;
                case 7:
                    $footer_data[$i]['template'] = 'views/footer/special_offer.php';
                    break;
                case 8:
                    $footer_data[$i]['template'] = 'views/footer/menu.php';
                    break;
                case 9:
                    $footer_data[$i]['template'] = 'views/footer/gallery.php';
                    break;
                case 10:
                    $footer_data[$i]['template'] = 'views/footer/list_category.php';
                    break;
                case 11:
                    $footer_data[$i]['template'] = 'views/footer/map.php';
                    break;
                case 12:
                    $footer_data[$i]['template'] = 'views/footer/list_blog.php';
                    break;
                case 13:
                    $footer_data[$i]['template'] = 'views/footer/tripadvisor.php';
                    break;
                case 15:
                    $footer_data[$i]['template'] = 'front.footer.patner';
                    array_push($footer_data[$index]['data'], ['judul'=>$footer_data[$i]['judul'],'link'=>$footer_data[$i]['link']]);
                default:
                    $footer_data[$i]['template'] = null;
                    break;
            }
            array_push($array['footer_kolom'.$footer_data[$i]['posisi']], $footer_data[$i]);
                        
            switch ($footer_data[$i]['role']) {
                case 5:
                    $array['kategori'] = $this->CompanyProfile->category();
                    break;
                case 7:
                    $array['spesial'] = $this->CompanyProfile->SpecialOffer();
                    break;
                case 9:                        
                        $array['footer_slider'][$footer_data[$i]['id_galeri_kategori']] = $this->CompanyProfile->footerSlider($footer_data[$i]['id_galeri_kategori']);
                    break;
                case 10:
                    $array['list_category'][$footer_data[$i]['id_galeri_kategori']] = $this->CompanyProfile->footerCategory($footer_data[$i]['id_galeri_kategori']);
                    break;
                case 12:
                    $array['list_blog_footer'] = $this->CompanyProfile->footerBlog();
                    break;
                default:                    
                    break;
            }          
        }
        
        $array['v'] = filemtime(FCPATH."/FrontUpdate.txt");
        return $array;
    }
    public function sidebar(){
        $array = $this->Sidebar->sidebar();
        
        // $patner = array_map(function($n){return $n['role'];}, $array);
        // $index = null;
        // foreach ($patner as $key => $value) {
        //     if ($value == 15) {
        //         $index = $key;
        //         $array[$index]['data'] = array();
        //     }
        // }
        foreach ($array as $key => $row) {        
            switch ($row) {
                case 1:
                    // socialmedia
                    $array[$key]['data'] = true;
                    break;
                case 2:
                    // kontak
                    $array[$key]['data'] = true;                    
                    break;
                case 3:
                    // logo
                    $array[$key]['data'] = true;                    
                    break;
                case 4:
                    //deskripsi
                    $array[$key]['data'] = true;                
                    break;
                case 5:
                    $array[$key]['data'] = $this->Sidebar->sidebar();
                    break;
                case 6:
                    //profile website 
                    break;
                case 7:
                    // special produk
                    // $array[$key]['data'] = array();
                    // $special = $this->Sidebar->SpecialOffer();
                    // foreach ($special as $spesial) {
                    //     $item_row = array();
                    //     if($spesial['page_judul'] == null) {                            
                    //         $item_row = array(                            
                    //             'link' => base_url('link').'/'.$spesial['product_slug'],
                    //             'title' => $spesial['product_judul'],                            
                    //             'img_path' => AWS_PATH.'image/',
                    //             'img' => '/'.$spesial['product_gambar']                            
                    //         );
                    //     }else{                    
                    //         $item_row = array(                            
                    //             'link' => base_url().'/'.$spesial['page_slug'],
                    //             'title' => $spesial['page_judul'],                            
                    //             'img_path' =>AWS_PATH.'image/',
                    //             'img' => '/'.$spesial['page_gambar']
                                
                    //         );                        
                    //     }
                    //     array_push($array[$key]['data'],$item_row);
                    // }
                    $array[$key]['data'] = $this->Sidebar->sidebar_blog();
                    break;
                case 8:
                    // Menu
                    $array[$key]['data'] = true;
                    break;
                case 9:
                    // gallery
                    break;
                case 10:
                    // list produk by category
                    $array[$key]['data'] = $this->Sidebar->product($row['category']);
                    break;
                case 11:
                    // map
                    $array[$key]['data'] = true;
                    break;
                case 12:
                    // blog
                    $array[$key]['data'] = $this->Sidebar->blog();
                    break;
                case 13:
                    // Tripadvisor
                    $array[$key]['data'] = true;                    
                    break;
                case 14:
                    //All Produk
                    $array[$key]['data'] = $this->Sidebar->AllProduct();                
                    break;
                case 15:
                    // patner link                
                    array_push($array[$index]['data'], ['judul'=>$row['judul'],'link'=>$row['link']]);                    
                default:            
                    break;
            }
        }
        
        return $array;   

    }
    public function sidebar_blog(){
        $array = $this->Sidebar->sidebar_blog();
        
        // $patner = array_map(function($n){return $n['role'];}, $array);
        // $index = null;
        // foreach ($patner as $key => $value) {
        //     if ($value == 15) {
        //         $index = $key;
        //         $array[$index]['data'] = array();
        //     }
        // }
        foreach ($array as $key => $row) {        
            switch ($row) {
                case 1:
                    // socialmedia
                    $array[$key]['data'] = true;
                    break;
                case 2:
                    // kontak
                    $array[$key]['data'] = true;                    
                    break;
                case 3:
                    // logo
                    $array[$key]['data'] = true;                    
                    break;
                case 4:
                    //deskripsi
                    $array[$key]['data'] = true;                
                    break;
                case 5:
                    $array[$key]['data'] = $this->Sidebar->sidebar();
                    break;
                case 6:
                    //profile website 
                    break;
                case 7:
                    // special produk
                    // $array[$key]['data'] = array();
                    // $special = $this->Sidebar->SpecialOffer();
                    // foreach ($special as $spesial) {
                    //     $item_row = array();
                    //     if($spesial['page_judul'] == null) {                            
                    //         $item_row = array(                            
                    //             'link' => base_url('link').'/'.$spesial['product_slug'],
                    //             'title' => $spesial['product_judul'],                            
                    //             'img_path' => AWS_PATH.'image/',
                    //             'img' => '/'.$spesial['product_gambar']                            
                    //         );
                    //     }else{                    
                    //         $item_row = array(                            
                    //             'link' => base_url().'/'.$spesial['page_slug'],
                    //             'title' => $spesial['page_judul'],                            
                    //             'img_path' =>AWS_PATH.'image/',
                    //             'img' => '/'.$spesial['page_gambar']
                                
                    //         );                        
                    //     }
                    //     array_push($array[$key]['data'],$item_row);
                    // }
                    $array[$key]['data'] = $this->Sidebar->sidebar_blog();
                    break;
                case 8:
                    // Menu
                    $array[$key]['data'] = true;
                    break;
                case 9:
                    // gallery
                    break;
                case 10:
                    // list produk by category
                    $array[$key]['data'] = $this->Sidebar->product($row['category']);
                    break;
                case 11:
                    // map
                    $array[$key]['data'] = true;
                    break;
                case 12:
                    // blog
                    $array[$key]['data'] = $this->Sidebar->blog();
                    break;
                case 13:
                    // Tripadvisor
                    $array[$key]['data'] = true;                    
                    break;
                case 14:
                    //All Produk
                    $array[$key]['data'] = $this->Sidebar->AllProduct();                
                    break;
                case 15:
                    // patner link                
                    array_push($array[$index]['data'], ['judul'=>$row['judul'],'link'=>$row['link']]);                    
                default:            
                    break;
            }
        }
        
        return $array;   

    }
    public function breadcrumb($array){
        $result = array();
        foreach ($array as $row) {
            if ($row['url'] == '') {
                $row['url'] = false;
            }
            array_push($result,$row);
        }
        return $result;
    }

    public function seo($array)
    {
        // 
        // $array['title']
        // $array['description']
        // $array['image']
        //  
        $array['author'] = ucwords(str_replace('https://www.','', base_url('')));
        $array['description'] = str_replace(array("\n", "\r"), '', substr(strip_tags($array['description']),0,150));

        $result = array(
            '<title>'.$array['title'].'</title>',
            '<meta name="description" content="'.$array['description'].'"/>',
            // '<meta name="keywords" content="'.$array['keyword'].'">',
            '<meta name="author" content="'.$array['author'].'">',
            '<meta property="og:type" content="article" />',
            '<meta property="og:title" content="'.$array['title'].'" />',
            '<meta property="og:description" content="'.$array['description'].'" />',
            '<meta property="og:image" content="'.$array['image'].'" />',
            '<meta property="og:image:width" content="480" />',
            '<meta property="og:image:height" content="480" />',
            '<meta property="og:site_name" content="'.$array['author'].'"/>',
            '<meta property="og:url" content="'.current_url().'"/>',
            '<meta name="twitter:card" content="summary" />',
            '<meta name="twitter:description" content="'.$array['description'].'" />',
            '<meta name="twitter:title" content="'.$array['title'].'" />',
            '<meta name="twitter:image" content="'.$array['image'].'" />'
        );
        return $result;
    }
    public function date_convert($date)
    {        
        $date = strtotime($date);
        $now_date = time();
        $range = (int) round(($now_date - $date) / (60 * 60 * 24));

        $month = ['Januari','February','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];         
        $sort_month = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];         
        $convert = array(            
            'long_month' => $month[(int) date("m",$date) - 1],
            'sort_month' => $sort_month[(int) date("m",$date) - 1],
            'day' => date("l",$date),
            'sort_day' => date("D",$date),            
            'second' => date("s",$date),
            'month' => date("m",$date),
            'menit' => date("M",$date),            
            'year' => date("Y",$date),
            'date' => date("d",$date),
            'minute' => date("i",$date),
            'hour' => date("H",$date),
            'distance' => $range
        );        
        return $convert;
    }


    // if null_review
    public function null_review($param,$slug)
    {
        switch ($param) {
            case 'product':
                $find = $this->db->from('product')
                                    ->select('id')
                                    ->where('slug',$slug)
                                    ->get()
                                    ->result_array();
                $array_review = array();
                for ($i=0; $i <10 ; $i++) {                     
                    array_push($array_review,['count' => 5,'id_product' => $find[0]['id']]);
                }
                $this->db->insert_batch('product_review', $array_review);
                $array = $this->db->from('product_review')
                            ->select('SUM(product_review.count) as review_total,count(*) as review_count')
                            ->where('product_review.id_product',$find[0]['id'])
                            ->get()
                            ->result_array();
                break;
            case 'tag':
                $find = $this->db->from('tag')
                            ->select('id')
                            ->where('slug',$slug)
                            ->get()
                            ->result_array();                            
                $array_review = array();
                for ($i=0; $i <10 ; $i++) {                     
                    array_push($array_review,['count' => 5,'id_tag' => $find[0]['id']]);
                }                        
                $this->db->insert_batch('tag_review', $array_review);
                $array = $this->db->from('tag_review')
                            ->select('SUM(tag_review.count) as review_total,count(*) as review_count')
                            ->where('tag_review.id_tag',$find[0]['id'])
                            ->get()
                            ->result_array();                            
                break;
            case 'page':
                $find = $this->db->from('page')
                            ->select('id')
                            ->where('slug',$slug)
                            ->get()
                            ->result_array();
                $array_review = array();
                for ($i=0; $i <10 ; $i++) {                     
                    array_push($array_review,['count' => 5,'id_page' => $find[0]['id']]);
                }            
                $this->db->insert('page_review', $array_review);

                $array = $this->db->from('page_review')
                            ->select('SUM(page_review.count) as review_total,count(*) as review_count')
                            ->where('page_review.id_page',$find[0]['id'])
                            ->get()
                            ->result_array();                            
                break;
            case 'blog':
                $find = $this->db->from('blog')
                                ->select('id')->where('slug',$slug)
                                ->get()
                                ->result_array();                                                        
                $array_review = array();
                for ($i=0; $i <10 ; $i++) {                     
                    array_push($array_review,['count' => 5,'id_blog' => $find[0]['id']]);
                }
                $this->db->insert_batch('blog_review',$array_review); 

                $array = $this->db->from('blog_review')
                            ->select('SUM(blog_review.count) as review_total,count(*) as review_count')
                            ->where('blog_review.id_blog',$find[0]['id'])
                            ->get()
                            ->result_array();
                break;
            default:
                return redirect()->back()->with('alert-error','Something Wrong Try again');
                break;
        }
        
        return $array;
    }
    public function list_comment($type,$slug)
    {                

        $post = $this->db->from($type)->select('id')->where('slug',$slug)->get()->result_array();
        if (empty($post)) {
            return false;
        }
        $post = $post[0];

        $data['parent'] =  $this->db->from('comment')
                                ->where('status',1)
                                ->where('type',$type)
                                ->where('post_id',$post['id'])
                                ->where('parent',0)
                                ->where('deleted_at IS NULL',null)
                                ->order_by('id','ASC')
                                ->get()
                                ->result_array();
                                
        $parent_list = array_map(function($a){return $a['id'];}, $data['parent']);
        if ($parent_list){
            $data['child'] = $this->db->from('comment')
                                ->where('status',1)
                                ->where_in('parent',$parent_list)
                                ->where('deleted_at IS NULL',null)
                                ->order_by('id','ASC')
                                ->get()
                                ->result_array();    
        }else{
            $data['child'] = [];
        }
        foreach ($data['parent'] as $index1 => $row1) {             
            $data['parent'][$index1]['child'] = array();
            
            foreach ($data['child'] as $index2 => $row2) {
                if ($row1['id'] == $row2['parent'] ) {
                    array_push($data['parent'][$index1]['child'], $row2);
                    unset($data['child'][$index2]);
                }
            }
        }
        
        return $data['parent'];
    }   
}