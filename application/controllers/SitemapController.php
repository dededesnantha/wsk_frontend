<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SitemapController extends CI_Controller {
    public function __construct()
    {
        parent::__construct();    
    }
    public function layout()
    {
        $this->output->set_content_type('Content-Type', 'text/xsl');
        $this->load->view('sitemap/layout');
    }
    public function home()
    {
        $data['load'] =  array(array('loc'=> base_url('tour-sitemap.xml'),
                                     'lastmod'=> @$this->db->from('product')->order_by('updated_at','DESC')->limit(1)->get()->result_array()[0]['updated_at']
                                    ),
                                array('loc'=> base_url('page-sitemap.xml'),
                                     'lastmod'=> @$this->db->from('page')->order_by('updated_at','DESC')->limit(1)->get()->result_array()[0]['updated_at']
                                    ),                                
                                array('loc'=> base_url('category-sitemap.xml'),
                                     'lastmod'=> @$this->db->from('kategori')->order_by('updated_at','DESC')->limit(1)->get()->result_array()[0]['updated_at']
                                    ),
                                array('loc'=> base_url('blog-sitemap.xml'),
                                     'lastmod'=>  @$this->db->from('blog')->order_by('updated_at','DESC')->limit(1)->get()->result_array()[0]['updated_at']
                                    ),
                                array('loc'=> base_url('tag-sitemap.xml'),
                                     'lastmod'=>  @$this->db->from('tag')->order_by('updated_at','DESC')->limit(1)->get()->result_array()[0]['updated_at']
                                    ),
                                array('loc'=> base_url('blog-category-sitemap.xml'),
                                     'lastmod'=> @$this->db->from('blog_kategori')->order_by('updated_at','DESC')->limit(1)->get()->result_array()[0]['updated_at']
                                    )
                        );

        $show = $this->db->from('web_component')->select('status')->where('name','AMP')->limit(1)->get()->result_array()[0];
        if ($show['status']) {
            array_push($data['load'], array('loc'=> base_url('amp_tour-sitemap.xml'),
                                     'lastmod'=> @$this->db->from('product')->order_by('updated_at','DESC')->limit(1)->get()->result_array()[0]['updated_at']
                                    ),
                                array('loc'=> base_url('amp_page-sitemap.xml'),
                                     'lastmod'=> @$this->db->from('page')->order_by('updated_at','DESC')->limit(1)->get()->result_array()[0]['updated_at']
                                    ),                                
                                array('loc'=> base_url('amp_category-sitemap.xml'),
                                     'lastmod'=> @$this->db->from('kategori')->order_by('updated_at','DESC')->limit(1)->get()->result_array()[0]['updated_at']
                                    ),
                                array('loc'=> base_url('amp_blog-sitemap.xml'),
                                     'lastmod'=>  @$this->db->from('blog')->order_by('updated_at','DESC')->limit(1)->get()->result_array()[0]['updated_at']
                                    ),
                                array('loc'=> base_url('amp_tag-sitemap.xml'),
                                     'lastmod'=>  @$this->db->from('tag')->order_by('updated_at','DESC')->limit(1)->get()->result_array()[0]['updated_at']
                                    ),
                                array('loc'=> base_url('amp_blog-category-sitemap.xml'),
                                     'lastmod'=> @$this->db->from('blog_kategori')->order_by('updated_at','DESC')->limit(1)->get()->result_array()[0]['updated_at']
                                    )
            );
        }

        $this->output->set_content_type('Content-Type', 'text/xsl');
        $this->load->view('sitemap/home',$data);
    }

    public function page()
    {        
        $data['image'] = true;
        $data['status'] = 'page';
        $data['image_url'] = base_url('image').'/';
        $data['site_url'] = base_url('').'/';
        $data['load'] = $this->db->from('page')->where('status',1)->get()->result_array();
        $this->output->set_content_type('Content-Type', 'text/xml');
        $this->load->view('sitemap/content',$data);
    }
    public function product()
    {        
        $data['image'] = true;
        $data['image_url'] = base_url('image').'/';
        $data['site_url'] = base_url('link').'/';
        $data['load'] = $this->db->from('product')
                    ->where('status',1)->get()->result_array();
        $this->output->set_content_type('Content-Type', 'text/xml');
        $this->load->view('sitemap/content',$data);
    }
    public function category()
    {        
        $data['image'] = true;
        $data['image_url'] = base_url('image').'/';
        $data['site_url'] = base_url('category').'/';
        $data['load'] = $this->db->from('kategori')->get()->result_array();
        $this->output->set_content_type('Content-Type', 'text/xml');
        $this->load->view('sitemap/content',$data);
    }
    public function blog()
    {        
        $data['image'] = true;
        $data['image_url'] = base_url('image').'/';
        $data['site_url'] = base_url('blog').'/';
        $data['load'] = $this->db->from('blog')->where('status',1)->get()->result_array();
        $this->output->set_content_type('Content-Type', 'text/xml');
        $this->load->view('sitemap/content',$data);
    }
    public function tag()
    {        
        $data['image'] = false;
        $data['image_url'] = '';
        $data['site_url'] = base_url('tag').'/';
        $data['load'] = $this->db->from('tag')->get()->result_array();
        $this->output->set_content_type('Content-Type', 'text/xml');
        $this->load->view('sitemap/content',$data);
    }
    public function blog_category()
    {        
        $data['image'] = false;
        $data['image_url'] = '';
        $data['site_url'] = base_url('blog/category').'/';
        $data['load'] = $this->db->from('blog_kategori')->get()->result_array();
        $this->output->set_content_type('Content-Type', 'text/xml');
        $this->load->view('sitemap/content',$data);
    }  
    public function amp_page()
    {        
        $data['image'] = true;
        $data['status'] = 'page';
        $data['image_url'] = base_url('image').'/';
        $data['site_url'] = base_url('amp/').'/';
        $data['load'] = $this->db->from('page')->where('status',1)->get()->result_array();
        $this->output->set_content_type('Content-Type', 'text/xml');
        $this->load->view('sitemap/content',$data);
    }
    public function amp_product()
    {        
        $data['image'] = true;
        $data['image_url'] = base_url('image').'/';
        $data['site_url'] = base_url('amp/link').'/';
        $data['load'] = $this->db->from('product')
                    ->where('status',1)->get()->result_array();
        $this->output->set_content_type('Content-Type', 'text/xml');
        $this->load->view('sitemap/content',$data);
    }
    public function amp_category()
    {        
        $data['image'] = true;
        $data['image_url'] = base_url('image').'/';
        $data['site_url'] = base_url('amp/category').'/';
        $data['load'] = $this->db->from('kategori')->get()->result_array();
        $this->output->set_content_type('Content-Type', 'text/xml');
        $this->load->view('sitemap/content',$data);
    }
    public function amp_blog()
    {        
        $data['image'] = true;
        $data['image_url'] = base_url('image').'/';
        $data['site_url'] = base_url('amp/blog').'/';
        $data['load'] = $this->db->from('blog')->where('status',1)->get()->result_array();
        $this->output->set_content_type('Content-Type', 'text/xml');
        $this->load->view('sitemap/content',$data);
    }
    public function amp_tag()
    {        
        $data['image'] = false;
        $data['image_url'] = '';
        $data['site_url'] = base_url('amp/tag').'/';
        $data['load'] = $this->db->from('tag')->get()->result_array();
        $this->output->set_content_type('Content-Type', 'text/xml');
        $this->load->view('sitemap/content',$data);
    }
    public function amp_blog_category()
    {        
        $data['image'] = false;
        $data['image_url'] = '';
        $data['site_url'] = base_url('amp/blog/category').'/';
        $data['load'] = $this->db->from('blog_kategori')->get()->result_array();
        $this->output->set_content_type('Content-Type', 'text/xml');
        $this->load->view('sitemap/content',$data);
    }  
}

/* End of file SItemapController.php */
/* Location: ./application/controllers/SItemapController.php */
