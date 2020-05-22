<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class ViewController extends CI_Controller {
    public function __construct()
    {
        parent::__construct();   
        $this->load->library(['user_agent','session','email']);               
    }
    public function index()
    {
        $this->load->model('Pengumuman');
        $data['Pengumuman'] = $this->Pengumuman->Pengumuman_sekolah();
        $data['kelas'] = $this->Pengumuman->Kelas();

        $data['pengumuman'] = "all";

        $this->load->view('inc/header_pengumuman',$data);
        $this->load->view('home_pengumuman');
        $this->load->view('inc/footer_pengumuman');
    }

    public function single_pengumuman()
    {
        $slug = $this->uri->segment(2);
        if ($slug == null) {
            return false;
        }
        var_dump ($slug);
        die();
    }


    public function single_product()
    {
        $slug = $this->uri->segment(2);
        if ($slug == null) {
            return false;
        }
        $this->load->model('Product');
        $data['main'] = $this->main();      
        $data['sidebar'] = $this->sidebar();
        $data['single'] = $this->Product->single($slug); 

        if ($data['single']) {    
            $data['single']['detail_updated_at'] = str_replace(' ', 'T', date("Y-m-d h:m:sP", strtotime($data['single']['updated_at'])));
            $data['single']['detail_created_at'] = str_replace(' ', 'T', date("Y-m-d h:m:sP", strtotime($data['single']['created_at'])));
            $data['tag'] = $this->Product->tag($data['single']['id']);
            $data['slider'] = $this->Product->slider($data['single']['id']);
            
            $slider = $data['slider'];               
            if ($slider) {                
                while(count($data['slider']) <= 5){
                    foreach ($slider as $key) {
                        array_push($data['slider'],$key);
                    }                    
                }
            }
            $data['related'] = $this->Product->related($data['single']['id_cat'],$data['single']['id']);
            $data['review'] = $this->Product->review($data['single']['slug']);
            if (!$data['review'][0]['review_total']) {
                $data['review'] = $this->null_review('product',$data['single']['slug']);
            }
            $data['review_ratting'] = round($data['review'][0]['review_total'] / $data['review'][0]['review_count'],1);
            $data['review_total'] = $data['review'][0]['review_count'];

            $data['list_page'] = $this->Product->ListPage($data['single']['id']);
            $data['widget'] = $this->Product->widget($data['single']['id']);
            $this->increament('product',$data['single']['slug']);            

        }else{
            return $this->page_not_found();
        }

        $data['optiomation'] = [];
        $data['optiomation']['author'] = ucwords(str_replace('https://www.','', base_url('')));
        $data['optiomation']['sitename'] = strtoupper(explode('.',str_replace('https://www.','', base_url('')))[0]);     
        $data['optiomation']['single_optiomation'] = array(
            'tag' => $data['tag'],
            'judul_cat' => $data['single']['judul_cat'],
            'created_at' => $data['single']['created_at'],
            'updated_at' => $data['single']['updated_at']
        );             

        $data['param'] = 'product';

        //breadcrum
        $breadcrumb = array(
            array(
                'name' => 'Home',
                'url' => base_url()
            ),
            array(
                'name' => $data['single']['judul_cat'],
                'url' => base_url('category').'/'.$data['single']['slug_cat']
            ),
            array(
                'name' => $data['single']['judul'],
                'url' => ''
            )
        );
        $data['breadcrumb'] = $this->breadcrumb($breadcrumb);

        // seo
        $seo = array();
        if (empty($data['single']['seo_judul'])) {
            $seo['title'] = $data['single']['judul'];
        }else{
            $seo['title'] = $data['single']['seo_judul'];
        }

        if (empty($data['single']['seo_deskripsi'])) {
            $seo['description'] = $data['single']['deskripsi'];
        }else{
            $seo['description'] = $data['single']['seo_deskripsi'];
        }
        if (empty($data['single']['gambar'])) {
            $seo['image'] = base_url('image').'/'.$data['single']['logo'];         
        }else{
            $seo['image'] = base_url('image').'/'.$data['single']['gambar'];
        }
        // rolling
       $data['data_client'] = $this->db->from('client')
                            ->where('status',1)
                            ->get()
                            ->result_array();
        $data['data'] = $this->db->from('promo')
                            ->join('client','client.id = promo.id_client')
                            ->select('promo.id as id_promo,
                                promo.id_client as id_client,
                                promo.date as date_promo,
                                client.status as status_client,
                                client.name as name_client')
                            ->get()
                            ->result_array();
        $mytime = date('Y-m-d');
        foreach ($data['data'] as $row) {
                $item_row = array(
                                'id_promo' => $row['id_promo'],
                                'id_client' => $row['id_client'],
                                'date_promo' => $row['date_promo'],
                                'name_client' => $row['name_client'],
                                'status_client'=>$row['status_client']
                            );
            }
            if (count($data['data_client']) == 0) {
                 $data['client'] =$this->db->from('client')
                                ->where('status',1)
                                ->get()
                                ->result_array();
            }
            elseif (count($data['data_client']) == 1) {
                $data['id'] = $this->db->from('client')
                                ->where('status',1)
                                ->select('id')
                                ->limit(1)
                                ->get()
                                ->result_array();
                    if (empty($data['id'])) {
                        $data['id'] = $this->db->from('client')
                                ->where('status',1)
                                ->select('id')
                                ->limit(1)
                                ->get()
                                ->result_array();
                    }
                foreach ($data['id'] as $row) {
                $item_row = array(
                                'id_client' => $row['id'],
                                'date'=>$mytime
                            );
                    }
                $this->db->update('promo', $item_row);
                $data['client'] = $this->db->from('client')
                                ->join('promo','client.id = promo.id_client')
                                ->Select('client.name, client.domain, client.email, client.phone, client.wa, client.wechat, client.kakaotalk, client.viber, client.line, client.booking, client.image')
                                ->get()
                                ->result_array();
            }else{
            if (empty($item_row['date_promo'] == $mytime)) {
                 $data['id'] = $this->db->from('client')
                                -> where('id >',$row['id_client'])
                                -> where('status',1)
                                ->Select('id')
                                ->limit(1)
                                ->get()
                                ->result_array();
                    if (empty($data['id'])) {
                        $data['id'] = $this->db->from('client')
                                -> where('id <',$row['id_client'])
                                -> where('status',1)
                                ->Select('id')
                                ->limit(1)
                                ->get()
                                ->result_array();
                    }
                foreach ($data['id'] as $row) {
                $item_row = array(
                                'id_client' => $row['id'],
                                'date'=>$mytime
                            );
                    }

                $this->db->update('promo', $item_row);

                $data['client'] = $this->db->from('client')
                                ->join('promo','client.id = promo.id_client')
                                ->Select('client.name, client.domain, client.email, client.phone, client.wa, client.wechat, client.kakaotalk, client.viber, client.line, client.booking, client.image')
                                ->get()
                                ->result_array();
                }else{
                $data['client'] = $this->db->from('client')
                                ->join('promo','client.id = promo.id_client')
                                ->Select('client.name, client.domain, client.email, client.phone, client.wa, client.wechat, client.kakaotalk, client.viber, client.line, client.booking, client.image')
                                ->get()
                                ->result_array();
                }
            }
        $data['seo'] = $this->seo($seo);
        $this->load->view('inc/header',$data);
        $this->load->view('single_product');                
        $this->load->view('inc/footer');
    }
    public function single_blog()
    {
        $slug = $this->uri->segment(2);
        if ($slug == null) {
            return false;
        }
        $this->load->model('Blog');
        $data['main'] = $this->main();      
        $data['sidebar'] = $this->sidebar_blog();
        $data['single'] = $this->Blog->single($slug);

        if ($data['single']) {    
            $data['single']['detail_updated_at'] = str_replace(' ', 'T', date("Y-m-d h:m:sP", strtotime($data['single']['updated_at'])));
            $data['single']['detail_created_at'] = str_replace(' ', 'T', date("Y-m-d h:m:sP", strtotime($data['single']['created_at'])));
            $data['tag'] = $this->Blog->tag($data['single']['id']);
            $data['related'] = $this->Blog->related($data['single']['id_cat'],$data['single']['id']);
            $data['review'] = $this->Blog->review($data['single']['id']);

            if (!$data['review'][0]['review_total']) {
                $data['review'] = $this->null_review('blog',$slug);                        
            }
            $data['review_ratting'] = round($data['review'][0]['review_total'] / $data['review'][0]['review_count'],1);
            $data['review_total'] = $data['review'][0]['review_count'];
            $data['comment'] = $this->list_comment('page',$data['single']['id']);        

            $data['product'] = $this->Blog->BookingList();
            $this->increament('blog',$data['single']['slug']);            

        }else{
            return $this->page_not_found();
        }

        $data['optiomation'] = [];
        $data['optiomation']['author'] = ucwords(str_replace('https://www.','', base_url('')));
        $data['optiomation']['sitename'] = strtoupper(explode('.',str_replace('https://www.','', base_url('')))[0]);            
        $data['optiomation']['single_optiomation'] = array(
            'tag' => $data['tag'],
            'judul_cat' => $data['single']['judul_cat'],
            'created_at' => $data['single']['created_at'],
            'updated_at' => $data['single']['updated_at']
        );       

        $data['param'] = 'blog';

        //breadcrum
        $breadcrumb = array(
            array(
                'name' => 'Home',
                'url' => base_url()
            ),
            array(  
                'name'=>'Blog',                    
                'url' => base_url('blog'),
            ),
            array(  
                'name'=> $data['single']['judul_cat'],
                'url' => base_url('blog/category').'/'.$data['single']['slug_cat'],
            ),
            array(  
                'name'=>$data['single']['judul'],            
                'url' => '',
            )
        );
        $data['breadcrumb'] = $this->breadcrumb($breadcrumb);

        // seo
        $seo = array();
        if (empty($data['single']['seo_judul'])) {
            $seo['title'] = $data['single']['judul'];
        }else{
            $seo['title'] = $data['single']['seo_judul'];
        }

        if (empty($data['single']['seo_deskripsi'])) {
            $seo['description'] = $data['single']['deskripsi'];
        }else{
            $seo['description'] = $data['single']['seo_deskripsi'];
        }
        if (empty($data['single']['gambar'])) {
            $seo['image'] = base_url('image').'/'.$data['single']['logo'];            
        }else{
            $seo['image'] = base_url('image').'/'.$data['single']['gambar'];
        }
        $data['seo'] = $this->seo($seo);

        // rolling
       $data['data_client'] = $this->db->from('client')
                            ->where('status',1)
                            ->get()
                            ->result_array();
        $data['data'] = $this->db->from('promo')
                            ->join('client','client.id = promo.id_client')
                            ->select('promo.id as id_promo,
                                promo.id_client as id_client,
                                promo.date as date_promo,
                                client.status as status_client,
                                client.name as name_client')
                            ->get()
                            ->result_array();
        $mytime = date('Y-m-d');
        foreach ($data['data'] as $row) {
                $item_row = array(
                                'id_promo' => $row['id_promo'],
                                'id_client' => $row['id_client'],
                                'date_promo' => $row['date_promo'],
                                'name_client' => $row['name_client'],
                                'status_client'=>$row['status_client']
                            );
            }
            if (count($data['data_client']) == 0) {
                 $data['client'] =$this->db->from('client')
                                ->where('status',1)
                                ->get()
                                ->result_array();
            }
            elseif (count($data['data_client']) == 1) {
                $data['id'] = $this->db->from('client')
                                ->where('status',1)
                                ->select('id')
                                ->limit(1)
                                ->get()
                                ->result_array();
                    if (empty($data['id'])) {
                        $data['id'] = $this->db->from('client')
                                ->where('status',1)
                                ->select('id')
                                ->limit(1)
                                ->get()
                                ->result_array();
                    }
                foreach ($data['id'] as $row) {
                $item_row = array(
                                'id_client' => $row['id'],
                                'date'=>$mytime
                            );
                    }
                $this->db->update('promo', $item_row);
                $data['client'] = $this->db->from('client')
                                ->join('promo','client.id = promo.id_client')
                                ->Select('client.name, client.domain, client.email, client.phone, client.wa, client.wechat, client.kakaotalk, client.viber, client.line, client.booking, client.image')
                                ->get()
                                ->result_array();
            }else{
            if (empty($item_row['date_promo'] == $mytime)) {
                 $data['id'] = $this->db->from('client')
                                -> where('id >',$row['id_client'])
                                -> where('status',1)
                                ->Select('id')
                                ->limit(1)
                                ->get()
                                ->result_array();
                    if (empty($data['id'])) {
                        $data['id'] = $this->db->from('client')
                                -> where('id <',$row['id_client'])
                                -> where('status',1)
                                ->Select('id')
                                ->limit(1)
                                ->get()
                                ->result_array();
                    }
                foreach ($data['id'] as $row) {
                $item_row = array(
                                'id_client' => $row['id'],
                                'date'=>$mytime
                            );
                    }

                $this->db->update('promo', $item_row);

                $data['client'] = $this->db->from('client')
                                ->join('promo','client.id = promo.id_client')
                                ->Select('client.name, client.domain, client.email, client.phone, client.wa, client.wechat, client.kakaotalk, client.viber, client.line, client.booking, client.image')
                                ->get()
                                ->result_array();
                }else{
                $data['client'] = $this->db->from('client')
                                ->join('promo','client.id = promo.id_client')
                                ->Select('client.name, client.domain, client.email, client.phone, client.wa, client.wechat, client.kakaotalk, client.viber, client.line, client.booking, client.image')
                                ->get()
                                ->result_array();
                }
            }


        $this->load->view('inc/header',$data);
        $this->load->view('single_blog');  
        $this->load->view('inc/footer');
    }
    public function single_page()
    {
        $slug = $this->uri->segment(1);
        if ($slug == null) {
            return false;
        }
        $this->load->model('Page');
        $data['main'] = $this->main();      
        $data['sidebar'] = $this->sidebar();
        $data['single'] = $this->Page->single($slug);        
        if ($data['single']) {
            $data['single']['detail_updated_at'] = str_replace(' ', 'T', date("Y-m-d h:m:sP", strtotime($data['single']['updated_at'])));
            $data['single']['detail_created_at'] = str_replace(' ', 'T', date("Y-m-d h:m:sP", strtotime($data['single']['created_at'])));           
            $data['review'] = $this->Page->review($data['single']['id']);
            if (!$data['review'][0]['review_total']) {
                $data['review'] = $this['null_review']('page',$slug);
            }           
            $data['review_ratting'] = round($data['review'][0]['review_total'] / $data['review'][0]['review_count'],1);
            $data['review_total'] = $data['review'][0]['review_count'];         
            $data['comment'] = $this->list_comment('page',$data['single']['id']);        
            $this->increament('page',$data['single']['slug']);            

        }else{
            return $this->page_not_found();
        }

        $data['optiomation'] = [];
        $data['optiomation']['author'] = ucwords(str_replace('https://www.','', base_url('')));
        $data['optiomation']['sitename'] = strtoupper(explode('.',str_replace('https://www.','', base_url('')))[0]);            
        $data['optiomation']['single_optiomation'] = array(
            'created_at' => $data['single']['created_at'],
            'updated_at' => $data['single']['updated_at']
        );

        $data['param'] = 'page';        

        //breadcrum
        $breadcrumb = array(
            array(
                'name' => 'Home',
                'url' => base_url()
            ),        
            array(  
                'name'=>$data['single']['judul'],            
                'url' => '',
            )
        );
        $data['breadcrumb'] = $this->breadcrumb($breadcrumb);

        // seo
        $seo = array();
        if (empty($data['single']['seo_judul'])) {
            $seo['title'] = $data['single']['judul'];
        }else{
            $seo['title'] = $data['single']['seo_judul'];
        }

        if (empty($data['single']['seo_deskripsi'])) {
            $seo['description'] = $data['single']['deskripsi'];
        }else{
            $seo['description'] = $data['single']['seo_deskripsi'];
        }
        if (empty($data['single']['gambar'])) {
            $seo['image'] = base_url('image').'/'.$data['single']['logo'];            
        }else{
            $seo['image'] = base_url('image').'/'.$data['single']['gambar'];
        }    
        $data['seo'] = $this->seo($seo);

        // rolling
       $data['data_client'] = $this->db->from('client')
                            ->where('status',1)
                            ->get()
                            ->result_array();
        $data['data'] = $this->db->from('promo')
                            ->join('client','client.id = promo.id_client')
                            ->select('promo.id as id_promo,
                                promo.id_client as id_client,
                                promo.date as date_promo,
                                client.status as status_client,
                                client.name as name_client')
                            ->get()
                            ->result_array();
        $mytime = date('Y-m-d');
        foreach ($data['data'] as $row) {
                $item_row = array(
                                'id_promo' => $row['id_promo'],
                                'id_client' => $row['id_client'],
                                'date_promo' => $row['date_promo'],
                                'name_client' => $row['name_client'],
                                'status_client'=>$row['status_client']
                            );
            }
            if (count($data['data_client']) == 0) {
                 $data['client'] =$this->db->from('client')
                                ->where('status',1)
                                ->get()
                                ->result_array();
            }
            elseif (count($data['data_client']) == 1) {
                $data['id'] = $this->db->from('client')
                                ->where('status',1)
                                ->select('id')
                                ->limit(1)
                                ->get()
                                ->result_array();
                    if (empty($data['id'])) {
                        $data['id'] = $this->db->from('client')
                                ->where('status',1)
                                ->select('id')
                                ->limit(1)
                                ->get()
                                ->result_array();
                    }
                foreach ($data['id'] as $row) {
                $item_row = array(
                                'id_client' => $row['id'],
                                'date'=>$mytime
                            );
                    }
                $this->db->update('promo', $item_row);
                $data['client'] = $this->db->from('client')
                                ->join('promo','client.id = promo.id_client')
                                ->Select('client.name, client.domain, client.email, client.phone, client.wa, client.wechat, client.kakaotalk, client.viber, client.line, client.booking, client.image')
                                ->get()
                                ->result_array();
            }else{
            if (empty($item_row['date_promo'] == $mytime)) {
                 $data['id'] = $this->db->from('client')
                                -> where('id >',$row['id_client'])
                                -> where('status',1)
                                ->Select('id')
                                ->limit(1)
                                ->get()
                                ->result_array();
                    if (empty($data['id'])) {
                        $data['id'] = $this->db->from('client')
                                -> where('id <',$row['id_client'])
                                -> where('status',1)
                                ->Select('id')
                                ->limit(1)
                                ->get()
                                ->result_array();
                    }
                foreach ($data['id'] as $row) {
                $item_row = array(
                                'id_client' => $row['id'],
                                'date'=>$mytime
                            );
                    }

                $this->db->update('promo', $item_row);

                $data['client'] = $this->db->from('client')
                                ->join('promo','client.id = promo.id_client')
                                ->Select('client.name, client.domain, client.email, client.phone, client.wa, client.wechat, client.kakaotalk, client.viber, client.line, client.booking, client.image')
                                ->get()
                                ->result_array();
                }else{
                $data['client'] = $this->db->from('client')
                                ->join('promo','client.id = promo.id_client')
                                ->Select('client.name, client.domain, client.email, client.phone, client.wa, client.wechat, client.kakaotalk, client.viber, client.line, client.booking, client.image')
                                ->get()
                                ->result_array();
                }
            }
        $this->load->view('inc/header',$data);
        $this->load->view('single_page');        
        $this->load->view('inc/footer');
    }
    public function list_product()
    {
        $slug = $this->uri->segment(2);
        if ($slug == null) {
            $slug = '';
        }
        $this->load->model('Product');
        $data['main'] = $this->main();      
        $data['sidebar'] = $this->sidebar();    

        $product = $this->Product->ListCategory($slug,$this->input->get('page'));
        $data['single'] = $product['seo'];
        $data['list']['data'] = $product['data'];
        $data['list']['paging'] = $product['paging']; 
        
        if (!$data['single']) {
            return $this->page_not_found();
        }

        //breadcrum
        $breadcrumb = array(
            array(
                'name' => 'Home',
                'url' => base_url()
            )        
        );

        if($data['main']['profile']['judul'] == $data['single']['judul']){
            $temp_breadcrumb = array(
                'name'=>'All Tour',
                'url' => ''
            );
            array_push($breadcrumb,$temp_breadcrumb);
        }else{
            $temp_breadcrumb = array(
                'name'=>$data['single']['judul'],
                'url' => ''
            );
            array_push($breadcrumb,$temp_breadcrumb);                                
        }
        $data['breadcrumb'] = $this->breadcrumb($breadcrumb);


        // seo

        $seo = array();
        if (empty($data['single']['seo_judul'])) { 
            if ($this->input->get('page') == 1 || $this->input->get('page') == null) {
                $seo['title'] = $data['single']['judul'];        
            }else{
                $seo['title'] = $data['single']['judul'] .' - Page '.$this->input->get('page');      
            }
        }else{
            if ($this->input->get('page') == 1 || $this->input->get('page') == null) {
                $seo['title'] = $data['single']['seo_judul'];
            }else{
                $seo['title'] = $data['single']['seo_judul'] .' - Page '.$this->input->get('page');
            }            
        }

        if (empty($data['single']['seo_deskripsi'])) {
            $seo['description'] = $data['main']['profile']['deskripsi'];
        }else{
            $seo['description'] = $data['single']['seo_deskripsi'];
        }
        if (empty($data['single']['gambar'])) {
            $seo['image'] = base_url('image').'/'.$data['main']['profile']['logo'];          
        }else{
            $seo['image'] = base_url('image').'/'.$data['main']['profile']['gambar'];           
        }
        $data['seo'] = $this->seo($seo);

        $this->load->view('inc/header',$data);    
        $this->load->view('list_product');        
        $this->load->view('inc/footer');  
    }
    public function list_blog()
    {
        $slug = $this->uri->segment(3);
        if ($slug == null) {
            $slug = '';
        }
        $this->load->model('Blog');
        $data['main'] = $this->main();      
        $data['sidebar'] = $this->sidebar();  

        $blog = $this->Blog->ListBlog($slug,$this->input->get('page'));
        $data['single'] = $blog['seo'];
        $data['list']['data'] = $blog['data'];
        $data['list']['paging'] = $blog['paging']; 
        
        if (!$data['single']) {
            return $this->page_not_found();
        }

        //breadcrum
        $breadcrumb = array(
            array(
                'name' => 'Home',
                'url' => base_url()
            )        
        );    

        if($data['main']['profile']['judul'] == $data['single']['judul']){
            $temp_breadcrumb = array(
                'name'=>'All Blog',
                'url' => ''
            );
            array_push($breadcrumb,$temp_breadcrumb);
        }else{
            $temp_breadcrumb = array(
                'name'=>'Blog',
                'url' => base_url('blog')
            );
            array_push($breadcrumb,$temp_breadcrumb);  
            $temp_breadcrumb = array(
                'name'=>$data['single']['judul'],
                'url' => ''
            );
            array_push($breadcrumb,$temp_breadcrumb);                                
        }
        $data['breadcrumb'] = $this->breadcrumb($breadcrumb);


        // seo

        $seo = array();
        if (empty($data['single']['seo_judul'])) { 
            if ($this->input->get('page') == 1 || $this->input->get('page') == null) {
                $seo['title'] = 'Blog - '.$data['single']['judul'];        
            }else{
                $seo['title'] = 'Blog - '.$data['single']['judul'] .' - Page '.$this->input->get('page');      
            }
        }else{
            if ($this->input->get('page') == 1 || $this->input->get('page') == null) {
                $seo['title'] = $data['single']['seo_judul'];
            }else{
                $seo['title'] = $data['single']['seo_judul'] .' - Page '.$this->input->get('page');
            }        
        }

        if (empty($data['single']['seo_deskripsi'])) {
            $seo['description'] = $data['main']['profile']['deskripsi'];
        }else{
            $seo['description'] = $data['single']['seo_deskripsi'];
        }
        if (empty($data['single']['gambar'])) {
            $seo['image'] = base_url('image/'.$data['main']['profile']['logo']);          
        }else{
            $seo['image'] = base_url('image/'.$data['single']['gambar']);           
        }
        $data['seo'] = $this->seo($seo);

        $this->load->view('inc/header',$data);    
        $this->load->view('list_blog_category');        
        $this->load->view('inc/footer');  
    }
    public function blog()
    {
        $slug = $this->uri->segment(3);
        if ($slug == null) {
            $slug = '';
        }
        $this->load->model('Blog');
        $data['main'] = $this->main();      
        $data['sidebar'] = $this->sidebar(); 
        $blog = $this->Blog->ListBlog($slug,$this->input->get('page'));

        $data['single'] = $blog['seo'];
        $data['list']['data'] = $blog['data'];
        $data['list']['paging'] = $blog['paging']; 
        
        if (!$data['single']) {
            return $this->page_not_found();
        }

        //breadcrum
        $breadcrumb = array(
            array(
                'name' => 'Home',
                'url' => base_url()
            )        
        );    

        if($data['main']['profile']['judul'] == $data['single']['judul']){
            $temp_breadcrumb = array(
                'name'=>'All Blog',
                'url' => ''
            );
            array_push($breadcrumb,$temp_breadcrumb);
        }else{
            $temp_breadcrumb = array(
                'name'=>'Blog',
                'url' => base_url('blog')
            );
            array_push($breadcrumb,$temp_breadcrumb);  
            $temp_breadcrumb = array(
                'name'=>$data['single']['judul'],
                'url' => ''
            );
            array_push($breadcrumb,$temp_breadcrumb);                                
        }
        $data['breadcrumb'] = $this->breadcrumb($breadcrumb);


        // seo

        $seo = array();
        if (empty($data['single']['seo_judul'])) { 
            if ($this->input->get('page') == 1 || $this->input->get('page') == null) {
                $seo['title'] = 'Blog - '.$data['single']['judul'];        
            }else{
                $seo['title'] = 'Blog - '.$data['single']['judul'] .' - Page '.$this->input->get('page');      
            }
        }else{
            if ($this->input->get('page') == 1 || $this->input->get('page') == null) {
                $seo['title'] = $data['single']['seo_judul'];
            }else{
                $seo['title'] = $data['single']['seo_judul'] .' - Page '.$this->input->get('page');
            }        
        }

        if (empty($data['single']['seo_deskripsi'])) {
            $seo['description'] = $data['main']['profile']['deskripsi'];
        }else{
            $seo['description'] = $data['single']['seo_deskripsi'];
        }
        if (empty($data['single']['gambar'])) {
            $seo['image'] = base_url('image/'.$data['main']['profile']['logo']);          
        }else{
            $seo['image'] = base_url('image/'.$data['single']['gambar']);           
        }
        $data['seo'] = $this->seo($seo);

        $this->load->view('inc/header',$data);    
        $this->load->view('blog');        
        $this->load->view('inc/footer');  
    }
    public function blog_lis()
    {
        $slug = $this->uri->segment(3);
        if ($slug == null) {
            $slug = '';
        }
        $this->load->model('Blog');
        $data['main'] = $this->main();      
        $data['sidebar'] = $this->sidebar();  

        $blog = $this->Blog->ListBlog($slug,$this->input->get('page'));


        $data['single'] = $blog['seo'];
        $data['list']['data'] = $blog['data'];
        $data['list']['paging'] = $blog['paging']; 
        
        if (!$data['single']) {
            return $this->page_not_found();
        }

        //breadcrum
        $breadcrumb = array(
            array(
                'name' => 'Home',
                'url' => base_url()
            )        
        );    

        if($data['main']['profile']['judul'] == $data['single']['judul']){
            $temp_breadcrumb = array(
                'name'=>'All Blog',
                'url' => ''
            );
            array_push($breadcrumb,$temp_breadcrumb);
        }else{
            $temp_breadcrumb = array(
                'name'=>'Blog',
                'url' => base_url('blog')
            );
            array_push($breadcrumb,$temp_breadcrumb);  
            $temp_breadcrumb = array(
                'name'=>$data['single']['judul'],
                'url' => ''
            );
            array_push($breadcrumb,$temp_breadcrumb);                                
        }
        $data['breadcrumb'] = $this->breadcrumb($breadcrumb);


        // seo

        $seo = array();
        if (empty($data['single']['seo_judul'])) { 
            if ($this->input->get('page') == 1 || $this->input->get('page') == null) {
                $seo['title'] = 'Blog - '.$data['single']['judul'];        
            }else{
                $seo['title'] = 'Blog - '.$data['single']['judul'] .' - Page '.$this->input->get('page');      
            }
        }else{
            if ($this->input->get('page') == 1 || $this->input->get('page') == null) {
                $seo['title'] = $data['single']['seo_judul'];
            }else{
                $seo['title'] = $data['single']['seo_judul'] .' - Page '.$this->input->get('page');
            }        
        }

        if (empty($data['single']['seo_deskripsi'])) {
            $seo['description'] = $data['main']['profile']['deskripsi'];
        }else{
            $seo['description'] = $data['single']['seo_deskripsi'];
        }
        if (empty($data['single']['gambar'])) {
            $seo['image'] = base_url('image/'.$data['main']['profile']['logo']);          
        }else{
            $seo['image'] = base_url('image/'.$data['single']['gambar']);           
        }
        $data['seo'] = $this->seo($seo);

        $this->load->view('inc/header',$data);    
        $this->load->view('list_blog');        
        $this->load->view('inc/footer');  
    }

    public function list_tag()
    {
        $slug = $this->uri->segment(2);
        if ($slug == null) {
            $slug = '';
        }
        $this->load->model('Tag');
        $data['main'] = $this->main();      
        $data['sidebar'] = $this->sidebar();    

        $tag = $this->Tag->ListTag($slug,$this->input->get('page'));    
        $data['list']['data'] = $tag['data'];
        $data['list']['paging'] = $tag['paging']; 
        
        $data['single'] = $this->Tag->single($slug);           
        
        if (!$data['single']) {
            return $this->page_not_found();
        }

        $data['review'] = $this->Tag->review($slug);
        if (!$data['review'][0]['review_total']) {
            $data['review'] = $this->null_review('tag',$slug);
        }
        $data['review_ratting'] = round($data['review'][0]['review_total'] / $data['review'][0]['review_count'],1);
        $data['review_total'] = $data['review'][0]['review_count'];

        $data['param'] = 'tag';


        //breadcrum
        $breadcrumb = array(
            array(
                'name' => 'Home',
                'url' => base_url()
            ),
            array(  'name'=>'Tag',
                'url' => ''
            ),
            array(  'name'=>$data['single']['judul'],
                'url' => ''
            )
        );    

        $data['breadcrumb'] = $this->breadcrumb($breadcrumb);


        // seo        
        $seo = array();
        if (empty($data['single']['seo_judul'])) { 
            if ($this->input->get('page') == 1 || $this->input->get('page') == null) {
                $seo['title'] = '✅ '.$data['single']['judul'];        
            }else{
                $seo['title'] = '✅ '.$data['single']['judul'] .' - Page '.$this->input->get('page');      
            }
        }else{
            if ($this->input->get('page') == 1 || $this->input->get('page') == null) {
                $seo['title'] = $data['single']['seo_judul'];
            }else{
                $seo['title'] = $data['single']['seo_judul'] .' - Page '.$this->input->get('page');
            }            
        }

        if (empty($data['single']['seo_deskripsi'])) {
            $seo['description'] = $data['main']['profile']['deskripsi'];
        }else{
            $seo['description'] = $data['single']['seo_deskripsi'];
        }
        if (empty($data['main']['profile']['gambar'])) {
            $seo['image'] = base_url('image').'/'.$data['main']['profile']['logo'];          
        }else{
            $seo['image'] = base_url('image').'/'.$data['main']['profile']['gambar'];           
        } 
        $data['seo'] = $this->seo($seo);

        $this->load->view('inc/header',$data);    
        $this->load->view('list_tag');        
        $this->load->view('inc/footer');  
    }
    public function list_gallery()
    {
        $slug = $this->uri->segment(2);
        if ($slug == null) {
            $slug = '';
        }
        $this->load->model('Gallery');
        $data['main'] = $this->main();      
        $data['sidebar'] = $this->sidebar();    

        $tag = $this->Gallery->ListGallery($slug,$this->input->get('page'));    
        $data['list']['data'] = $tag['data'];
        $data['list']['paging'] = $tag['paging'];         
        $data['single'] = $tag['seo'];
        
        foreach ($data['list']['data'] as $key => $value) {
            $data['list']['data'][$key]['detail_updated_at'] = str_replace(' ', 'T', date("Y-m-d h:m:sP", strtotime($value['updated_at'])));
            $data['list']['data'][$key]['detail_created_at'] = str_replace(' ', 'T', date("Y-m-d h:m:sP", strtotime($value['created_at'])));
        }
        //breadcrum
        $breadcrumb = array(
            array(
                'name' => 'Home',
                'url' => base_url()
            ),
            array(  'name'=>'Gallery',
                'url' => ''
            ),
            array(  'name'=>$data['single']['judul'],
                'url' => ''
            )
        );    

        $data['breadcrumb'] = $this->breadcrumb($breadcrumb);


        // seo        
        $seo = array();
        if (empty($data['single']['seo_judul'])) { 
            if ($this->input->get('page') == 1 || $this->input->get('page') == null) {
                $seo['title'] = 'Gallery - '.$data['single']['judul'];        
            }else{
                $seo['title'] = 'Gallery - '.$data['single']['judul'] .' - Page '.$this->input->get('page');      
            }
        }else{
            if ($this->input->get('page') == 1 || $this->input->get('page') == null) {
                $seo['title'] = $data['single']['seo_judul'];
            }else{
                $seo['title'] = $data['single']['seo_judul'] .' - Page '.$this->input->get('page');
            }            
        }

        if (empty($data['single']['seo_deskripsi'])) {
            $seo['description'] = $data['main']['profile']['deskripsi'];
        }else{
            $seo['description'] = $data['single']['seo_deskripsi'];
        }
        if (empty($data['main']['profile']['gambar'])) {
            $seo['image'] = base_url('image').'/'.$data['main']['profile']['logo'];          
        }else{
            $seo['image'] = base_url('image').'/'.$data['main']['profile']['gambar'];           
        } 
        $data['seo'] = $this->seo($seo);

        $this->load->view('inc/header',$data);    
        $this->load->view('list_gallery');        
        $this->load->view('inc/footer');  
    }
    public function search()
    {
        $slug = $this->uri->segment(2);
        if ($slug == null) {
            $slug = '';
        }
        $this->load->model('Home');
        $data['main'] = $this->main();      
        $data['sidebar'] = $this->sidebar();    

        $tag = $this->Home->search($this->input->get('search'),$this->input->get('page'));    
        $data['list']['data'] = $tag['data'];
        $data['list']['paging'] = $tag['paging'];         

        //breadcrum
        $breadcrumb = array(
            array(
                'name' => 'Home',
                'url' => base_url()
            ),
            array(  'name'=>'Search',
                'url' => ''
            )
        );    

        $data['breadcrumb'] = $this->breadcrumb($breadcrumb);


        // seo        
        $seo = array();
        if (empty($data['main']['profile']['seo_judul'])) {
            $seo['title'] = 'Search - '.$data['main']['profile']['judul'];
        }else{
            $seo['title'] = 'Search - '.$data['main']['profile']['seo_judul'];
        }

        if (empty($data['main']['profile']['seo_deskripsi'])) {
            $seo['description'] = $data['main']['profile']['deskripsi'];
        }else{
            $seo['description'] = $data['main']['profile']['seo_deskripsi'];
        }
        if (empty($data['main']['profile']['gambar'])) {
            $seo['image'] = base_url('image').'/'.$data['main']['profile']['logo'];          
        }else{
            $seo['image'] = base_url('image').'/'.$data['main']['profile']['gambar'];           
        }        
        $data['seo'] = $this->seo($seo);

        $this->load->view('inc/header',$data);    
        $this->load->view('search');        
        $this->load->view('inc/footer');  
    }    
    public function contact()
    {
        $data['main'] = $this->main();  
        $data['sidebar'] = $this->sidebar();
        
        //breadcrum
        $breadcrumb = array(
            array(
                'name' => 'Home',
                'url' => base_url()
            ),
            array(  'name'=>'Contact',
                'url' => ''
            )
        );

        $data['breadcrumb'] = $this->breadcrumb($breadcrumb);

        // seo

        $seo = array();
        if (empty($data['main']['profile']['seo_judul'])) {
            $seo['title'] = $data['main']['label']['Contact'] .' - '.$data['main']['profile']['judul'];
        }else{
            $seo['title'] = $data['main']['label']['Contact'] .' - '.$data['main']['profile']['seo_judul'];
        }

        if (empty($data['main']['profile']['seo_deskripsi'])) {
            $seo['description'] = $data['main']['profile']['deskripsi'];
        }else{
            $seo['description'] = $data['main']['profile']['seo_deskripsi'];
        }
        if (empty($data['main']['profile']['gambar'])) {
            $seo['image'] = base_url('image').'/'.$data['main']['profile']['logo'];          
        }else{
            $seo['image'] = base_url('image').'/'.$data['main']['profile']['gambar'];           
        }        
        $data['seo'] = $this->seo($seo);

        $this->load->view('inc/header',$data);
        $this->load->view('contact');        
        $this->load->view('inc/footer');
    }
    public function booking()
    {
        $this->load->model('Home');
        $data['main'] = $this->main();  
        $data['sidebar'] = $this->sidebar();
        $data['product'] = $this->Home->BookingList();

        //breadcrum
        $breadcrumb = array(
            array(
                'name' => 'Home',
                'url' => base_url()
            ),
            array(  'name'=>'Booking',
                'url' => ''
            )
        );

        $data['breadcrumb'] = $this->breadcrumb($breadcrumb);

        // seo
        $seo = array();
        if (empty($data['main']['profile']['seo_judul'])) {
            $seo['title'] = $data['main']['label']['Contact'] .' - '.$data['main']['profile']['judul'];
        }else{
            $seo['title'] = $data['main']['label']['Contact'] .' - '.$data['main']['profile']['seo_judul'];
        }

        if (empty($data['main']['profile']['seo_deskripsi'])) {
            $seo['description'] = $data['main']['profile']['deskripsi'];
        }else{
            $seo['description'] = $data['main']['profile']['seo_deskripsi'];
        }
        if (empty($data['main']['profile']['gambar'])) {
            $seo['image'] = AWS_PATH.'image/'.$data['main']['profile']['logo'];          
        }else{
            $seo['image'] = AWS_PATH.'image/'.$data['main']['profile']['gambar'];           
        }        
        $data['seo'] = $this->seo($seo);

        $this->load->view('inc/header',$data);
        $this->load->view('booking');        
        $this->load->view('inc/footer');
    }
    public function booking_send()
    {
        $this->load->model('CompanyProfile');
        $data['request'] = $this->input->post();
        $data['site'] = $this->CompanyProfile->profile();
        $data['kontak'] = $this->CompanyProfile->contact();

        
        $message = $this->load->view('email/email',$data,true);
        $ci = get_instance();
        $config['protocol'] = MAIL_DRIVER;
        $config['smtp_host'] = MAIL_HOST;
        $config['smtp_port'] = MAIL_PORT;
        $config['smtp_user'] = MAIL_USERNAME;
        $config['smtp_pass'] = MAIL_PASSWORD;
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['wordwrap'] = TRUE;

        $this->email->initialize($config);
        $this->email->from(MAIL_USERNAME, $data['site']['judul']);
        $this->email->to($data['request']['email']);    
        $this->email->subject('Email Booking');    
        $this->email->message($message);
        $this->email->send();

        $message = $this->load->view('email/received/email',$data,true);
        $ci = get_instance();
        $config['protocol'] = MAIL_DRIVER;
        $config['smtp_host'] = MAIL_HOST;
        $config['smtp_port'] = MAIL_PORT;
        $config['smtp_user'] = MAIL_USERNAME;
        $config['smtp_pass'] = MAIL_PASSWORD;
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['wordwrap'] = TRUE;

        $this->email->initialize($config);
        $this->email->from(MAIL_USERNAME, $data['site']['judul']);        
        $this->email->to($data['site']['email']);
        $this->email->subject('Email Booking');
        $this->email->message($message);
        $this->email->send();

        $data['request']['ip'] = $this->input->ip_address();
        $data['request']['nama'] = $data['request']['initials'].' '.$data['request']['first_name'].' '.$data['request']['last_name'];        
        
        // var_dump ($data['request']['tabs']);
        // die();

        // $tabs = $data['request']['tabs'];

        
        if (empty($data['request']['custom_tour'])) {
            unset($data['request']['custom_tour']);
        }else{
            $custom_tour = $data['request']['custom_tour'];
            unset($data['request']['custom_tour']);
        }
        $tour = $data['request']['tour'];
        unset($data['request']['tabs']);
        unset($data['request']['tour']); 

        $this->db->insert('booking', $data['request']);

        $id = $this->db->insert_id(); 
        
        if (!empty($tour)) {
            foreach ($tour as $value) {
                if (trim($value) != '') {                        
                    $id_product = $this->db->from('product')
                    ->select('id')
                    ->where('judul',$value)
                    ->get()
                    ->result_array();
                    if (!$id_product) {
                        $id_product = 0;
                    }else{
                        $id_product = $id_product[0]['id'];
                    }
                    $books = array('booking_id' => $id,'product_id'=>$id_product,'type'=>'Package Tour','name'=>$value);                
                    $this->db->insert('booking_item', $books);
                }
            }
        }    

        if (!empty($custom_tour)) {
            foreach ($custom_tour as $value) {
                if (trim($value) != '') {                            
                    $books = array('booking_id' => $id,'type'=>'Custom Tour','name'=>$value);
                    $this->db->insert('booking_item', $books);                    
                }
            }
        }

        $this->session->set_flashdata('alert-success', 'We would like to thank you for choosing . Following to your reservation here we are pleased to confirm your booking as follow');
        return redirect($this->agent->referrer(),'refresh');
    }
    public function review_send()
    {    
        $post = $this->input->post();
        if (!empty($post['g-recaptcha-response'])) {        
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify?secret='.CAPCHA_SECRET_KEY.'&response='.$post['g-recaptcha-response']);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HEADER, 0);                
            $output = curl_exec($ch);            
            curl_close($ch);
            $responseData = json_decode($output);
            if($responseData->success){  
                unset($post['g-recaptcha-response']); 
                $post['created_at'] = date("Y-m-d");
                $post['updated_at'] = date("Y-m-d");
                $this->db->insert('review',$post);
                $this->session->set_flashdata('alert-success', 'Thanks For Your Review');
                return redirect($this->agent->referrer(),'refresh');                
            }else{
                $this->session->set_flashdata('alert-error', 'reCAPTCHA Time out, Please reSubmit');
                return redirect($this->agent->referrer(),'refresh');                
            }
        }else{            
            $this->session->set_flashdata('alert-error', 'Please checked reCAPTCHA');
            return redirect($this->agent->referrer(),'refresh');
        }
    }
    public function contact_send()
    {

        $this->load->model('CompanyProfile');  
        $post = $this->input->post();    
        if (!empty($post['g-recaptcha-response'])) {        
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify?secret='.CAPCHA_SECRET_KEY.'&response='.$post['g-recaptcha-response']);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HEADER, 0);                
            $output = curl_exec($ch);            
            curl_close($ch);
            $responseData = json_decode($output);
            if($responseData->success){                
                $data['request'] = $this->input->post();
                $data['site'] = $this->CompanyProfile->profile();
                $data['kontak'] = $this->CompanyProfile->contact();
                
                $message = $this->load->view('email/email_contact',$data,true);
                $ci = get_instance();
                $config['protocol'] = MAIL_DRIVER;
                $config['smtp_host'] = MAIL_HOST;
                $config['smtp_port'] = MAIL_PORT;
                $config['smtp_user'] = MAIL_USERNAME;
                $config['smtp_pass'] = MAIL_PASSWORD;
                $config['charset'] = "utf-8";
                $config['mailtype'] = "html";
                $config['wordwrap'] = TRUE;

                $this->email->initialize($config);
                $this->email->from(MAIL_USERNAME, $data['site']['judul']);
                $this->email->to($data['request']['email']);    
                $this->email->subject($data['request']['subject']);            
                $this->email->message($message);
                $this->email->send();

                $message = $this->load->view('email/received/email_contact',$data,true);
                $ci = get_instance();
                $config['protocol'] = MAIL_DRIVER;
                $config['smtp_host'] = MAIL_HOST;
                $config['smtp_port'] = MAIL_PORT;
                $config['smtp_user'] = MAIL_USERNAME;
                $config['smtp_pass'] = MAIL_PASSWORD;
                $config['charset'] = "utf-8";
                $config['mailtype'] = "html";
                $config['wordwrap'] = TRUE;

                $this->email->initialize($config);
                $this->email->from(MAIL_USERNAME, $data['site']['judul']);            
                $this->email->to($data['site']['email']);    
                $this->email->subject($data['request']['subject']);
                $this->email->message($message);
                $this->email->send();

                

                $this->session->set_flashdata('alert-success', 'Message Has been Sent');
                return redirect($this->agent->referrer(),'refresh');                
            }else{
                $this->session->set_flashdata('alert-error', 'reCAPTCHA Time out, Please reSubmit');
                return redirect($this->agent->referrer(),'refresh');                
            }
        }else{            
            $this->session->set_flashdata('alert-error', 'Please checked reCAPTCHA');
            return redirect($this->agent->referrer(),'refresh');
        }
    } 
    public function single_send()
    {
        if (isset($_SESSION['category'])) {            
            $this->session->set_flashdata('category',$this->input->post('category'));
        }
        if (isset($_SESSION['tour'])) {                    
            $this->session->set_flashdata('tour',$this->input->post('tour'));
        }
        if (isset($_SESSION['date'])) {
            $this->session->set_flashdata('date',$this->input->post('date'));
        }
        if (isset($_SESSION['adult'])) {            
            $this->session->set_flashdata('adult',$this->input->post('adult'));
        }
        if (isset($_SESSION['child'])) {
            $this->session->set_flashdata('child',$this->input->post('child'));
        }
        return redirect(base_url('booking.html'));
    }
    public function home_send()
    {        
        if (isset($_SESSION['category'])) {            
            $this->session->set_flashdata('category',$this->input->post('category'));
        }
        if (isset($_SESSION['tour'])) {
            $this->session->set_flashdata('tour',$this->input->post('tour'));
        }
        if (isset($_SESSION['date'])) {
            $this->session->set_flashdata('date',$this->input->post('date'));
        }
        if (isset($_SESSION['adult'])) {            
            $this->session->set_flashdata('adult',$this->input->post('adult'));
        }
        if (isset($_SESSION['child'])) {
            $this->session->set_flashdata('child',$this->input->post('child'));
        }
        return redirect(base_url('booking.html'));
    }

    public function post_review()
    {                

        $post = $this->input->post();
        switch ($this->uri->segment(2)) {
            case 'product':
            $find = $this->db->from('product')->select('id')->where('slug',$post['slug'])->get()->result_array();
            $this->db->insert('product_review', [
                'count' => $post['rating'],
                'id_product' => $find[0]['id']
            ]);            
            break;
            case 'tag':
            $find = $this->db->from('tag')->select('id')->where('slug',$post['slug'])->get()->result_array();
            $this->db->insert('tag_review', [
                'count' => $post['rating'],
                'id_tag' => $find[0]['id']
            ]);
            break;
            case 'page':
            $find = $this->db->from('page')->select('id')->where('slug',$post['slug'])->get()->result_array();
            $this->db->insert('page_review', [
                'count' => $post['rating'],
                'id_page' => $find[0]['id']
            ]);            
            break;
            case 'blog':
            $find = $this->db->from('blog')->select('id')->where('slug',$post['slug'])->get()->result_array();
            $this->db->insert('blog_review', [
                'count' => $post['rating'],
                'id_blog' => $find[0]['id']
            ]);            
            break;
            default:
            $this->session->set_flashdata('alert-error', 'Something Wrong Try again');
            return redirect($this->agent->referrer(),'refresh');                
            break;
        }
        $this->session->set_flashdata('alert-success', 'Thanks for your review');
        return redirect($this->agent->referrer(),'refresh');    
    }
    public function comment()
    {
        $post = $this->input->post();
        $table = $this->uri->segment(2);
        if ($table == 'tour'){
            $table = 'product';
        }
        
        $get = $this->db
        ->from($this->uri->segment(2))
        ->select('id')
        ->where('slug',$this->uri->segment(3))
        ->get()
        ->result_array()[0];


        $post = array_merge($post,[
            'type' => $this->uri->segment(2),
            'post_id' => $get['id'],
            'ip' => $this->input->ip_address(),
            'open' => 0,
            'created_at' => date("Y-m-d"),
            'updated_at' => date("Y-m-d"),
            'status' => 1,
            'user' => 1,
        ]);
        $this->db->insert('comment', $post);
        
        $data['request'] = $post;
        $data['site'] = $this->CompanyProfile->profile();
        $data['kontak'] = $this->CompanyProfile->contact();

        $message = $this->load->view('email/email_comment',$data,true);
        $ci = get_instance();
        $config['protocol'] = MAIL_DRIVER;
        $config['smtp_host'] = MAIL_HOST;
        $config['smtp_port'] = MAIL_PORT;
        $config['smtp_user'] = MAIL_USERNAME;
        $config['smtp_pass'] = MAIL_PASSWORD;
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['wordwrap'] = TRUE;

        $this->email->initialize($config);
        $this->email->from(MAIL_USERNAME, $data['site']['judul']);
        $this->email->to($data['site']['email']);    
        $this->email->subject('Comment');
        $this->email->cc($data['request']['email']);
        $this->email->message($message);
        $this->email->send();

        $this->session->set_flashdata('alert-success', 'Comment Already been Send , We will send info reply via email');
        return redirect($this->agent->referrer(),'refresh');    
    }
    public function page_not_found($value='')
    {

        $this->load->model('Home');
        $this->output->set_status_header('404'); 
        $data['main'] = $this->main();
        $data['sidebar'] = $this->sidebar();

        $data['seo'] = array(
            '<title>Page Not Found - 404</title>',
            '<meta name="robots" content="noindex, nofollow">'
        );

        $this->load->view('inc/header',$data);
        $this->load->view('404');        
        $this->load->view('inc/footer');
    }
    public function records_wa($id='')
    {  

       $id = $this->uri->segment(2);

       $this->db->insert('record_wa', ['ip' => $this->input->ip_address(),'referer'=>$this->agent->referrer()]);            
       return redirect('https://api.whatsapp.com/send?phone='.str_replace('+','',$id),'refresh');


   }
   public function increament($table,$slug)
   {
    $this->db->where('slug', $slug);
    $this->db->set('view', 'view+1', FALSE);
    $this->db->update($table);        
}

    // public function List_blog()
    // {
    //     # code...
    //     
    // }
}