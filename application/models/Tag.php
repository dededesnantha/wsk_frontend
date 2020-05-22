<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tag extends CI_Model {
	public function ListTag($slug='',$page=1)
    {   
        if ($page <= 0) {
            $page = 0;
        }else{
            $page = $page-1;
        }
        $this->load->library('pagination');
        $per_page = 14;
      

        $config['total_rows'] = $this->db->from('all_tag')
                                ->select('count(*) as num')                                
                                ->join('product','all_tag.id_product = product.id','left')
	                            ->join('blog','all_tag.id_blog = blog.id','left')
	                            ->join('tag','tag.id = all_tag.id_tag')
	                            ->where('tag.slug',$slug)
                                ->get()
                                ->result_array()[0]['num'];
        
        $config['base_url'] = base_url('tag/'.$slug);                                       
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
                    		->join('product','all_tag.id_product = product.id','left')
                            ->join('blog','all_tag.id_blog = blog.id','left')
                            ->join('tag','tag.id = all_tag.id_tag')
                            ->where('tag.slug',$slug)
                            ->order_by('all_tag.id','DESC')
                            ->select('product.judul as judul_product,
                            			product.gambar as gambar_product,
                            			product.slug as slug_product,
                            			product.deskripsi as deskripsi_product,
                            			blog.judul as judul_blog,
                            			blog.gambar as gambar_blog,
                            			blog.slug as slug_blog,
                            			blog.deskripsi as deskripsi_blog')
   					->get('all_tag',$per_page,$per_page*$page)
                    ->result_array();   
        return $result;   
    }
	public function review($slug='')
	{
		$result = $this->db->from('tag_review')	
                            ->join('tag','tag.id = tag_review.id_tag')
                            ->select('SUM(tag_review.count) as review_total,
                            			count(*) as review_count')
                            ->where('tag.slug',$slug)
                            ->get()
                            ->result_array();   
        return $result;   
	}
	public function single($slug='')
	{		
		$result = $this->db->from('tag')
						->where('slug',$slug)
						->get()
						->result_array();
		if ($result) {			
        	return $result[0];
		}else{
        	return false;		
		}
	}

}

/* End of file Tag.php */
/* Location: ./application/models/Tag.php */