<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimoni extends CI_Model {
	public function single($slug='')
	{
		$result = $this->db->from('testimonial')	               
					->where('slug', $slug)
                	->where('deleted_at IS NULL',null)
                	->get()
                	->result_array();
                if ($result) {
                	$result = $result[0];
                }
                return $result;
	}
        public function lists($page = 1)
        {
                if ($page <= 0) {
                        $page = 0;
                }else{
                        $page = $page-1;
                }
                $this->load->library('pagination');
                $per_page = 12;
                $config['base_url'] = base_url('testimonial');
                $config['total_rows'] =$this->db
                                ->from('testimonial')
                                ->select('count(*) as num')
                                ->where('deleted_at IS NULL',null)
                                ->get()
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
                        ->select('name,
                                slug,
                                image,
                                LEFT(description,400) as description')
                        ->order_by('id','DESC')
                        ->where('deleted_at IS NULL',null)
                        ->get('testimonial',$per_page,$per_page*$page)
                        ->result_array();       
                return $result;
        }
        public function category()
        {               
                $result = $this->db->from('home_category')
                        ->select('home_category.position,p_category.name,p_category.image,p_category.slug')
                        ->join('p_category', 'home_category.id_category = p_category.id')
                        ->order_by('home_category.position','ASC')              
                        ->get()
                        ->result_array();       
                return $result;
        }
}

/* End of file Testimoni.php */
/* Location: ./application/models/Testimoni.php */