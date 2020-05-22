<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Model {
	public function ListGallery($slug='',$page=1)
    {        
        if ($page <= 0) {
            $page = 0;
        }else{
            $page = $page-1;
        }
        $this->load->library('pagination');
        $per_page = 14;      
        if ($slug) {
            $result['seo'] = $this->db->from('galeri_kategori')
				            ->select('judul,
				            		seo_judul,
				            		seo_kata_kunci,
				            		seo_deskripsi')
                            ->where('slug',$slug)
                            ->limit(1)
                            ->get()                                    
                            ->result_array()[0]; 
            $config['base_url'] = base_url('gallery/'.$slug);
        }else{    
            $result['seo'] = $this->db->from('profile_website')
                            ->limit(1)
                            ->get()
                            ->result_array()[0];
            $config['base_url'] = base_url('gallery');        
        }
        $config['total_rows'] = $this->db->from('product')
                                ->select('count(*) as num')                                
                                ->join('kategori','product.id_kategori = kategori.id')
                                ->where('product.status',1);
        if ($slug) {
            $config['total_rows'] = $config['total_rows']->where('kategori.slug',$slug);
        }
        $config['total_rows'] = $config['total_rows']->get()
                                ->result_array()[0]['num'];
                                
        $config['per_page'] = $per_page;
        $config['enable_query_strings'] = TRUE;
        $config['page_query_string'] = TRUE;    
        $config['query_string_segment'] = 'page';
        $config['use_page_numbers'] = TRUE;     

        $config['full_tag_open'] = '<ul class="pagination pagination-sm">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span>';
        $config['cur_tag_close'] = '</span></li>';

        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['next_link'] = 'Next';

        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['prev_link'] = 'Previous';

        $config['last_link'] = FALSE;
        $config['first_link'] = FALSE;

        $this->pagination->initialize($config); 
        $result['paging'] = $this->pagination->create_links();
        $result['data'] = $this->db
                    ->join('galeri_kategori','galeri.id_galeri_kategori = galeri_kategori.id')
                    ->where('galeri.id_product',0)                   
                    ->select('galeri.judul,
                    			galeri.gambar,
                    			galeri_kategori.slug,
                    			galeri.updated_at,
                    			galeri.created_at')
                    ->order_by('galeri.id','DESC');
        if ($slug) {
            $result['data'] = $result['data']->where('galeri_kategori.slug',$slug);
        }
        $result['data'] = $result['data']->get('galeri',$per_page,$per_page*$page)
                    ->result_array();
        return $result;   
    }
}

/* End of file Gallery.php */
/* Location: ./application/models/Gallery.php */