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
        $data['load'] =  array(array('loc'=> base_url('pengumuman.xml'),
                                     'lastmod'=> @$this->db->from('pengumuman')->order_by('id','DESC')->limit(1)->get()->result_array()[0]
                                    )
                        );
        
        $this->output->set_content_type('Content-Type', 'text/xsl');
        $this->load->view('sitemap/home',$data);
    }

    public function pengumuman()
    {
        $data['image'] = true;
        $data['status'] = 'page';
        $data['image_url'] = base_url('image').'/';
        $data['site_url'] = base_url('').'/';
        $data['load'] = $this->db->from('pengumuman')->where('target_type','public')->get()->result_array();
        $this->output->set_content_type('Content-Type', 'text/xml');
        $this->load->view('sitemap/content',$data);
    }
    public function amp_pengumuman()
    {        
        $data['image'] = true;
        $data['status'] = 'page';
        $data['image_url'] = base_url('image').'/';
        $data['site_url'] = base_url('amp/').'/';
        $data['load'] = $this->db->from('pengumuman')->where('target_type','public')->get()->result_array();
        $this->output->set_content_type('Content-Type', 'text/xml');
        $this->load->view('sitemap/content',$data);
    }
}

/* End of file SItemapController.php */
/* Location: ./application/controllers/SItemapController.php */
