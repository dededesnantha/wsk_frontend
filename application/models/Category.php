<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Model {
	public function first($slug='')
	{		
		$result = $this->db
				->from('p_category')
				->where('slug',$slug)
				->get()
				->result_array()[0];
		return $result;
	}
	public function lists($slug='',$page = 1)
	{
		if ($page <= 0) {
			$page = 0;
		}else{
			$page = $page-1;
		}
		$this->load->library('pagination');
		$per_page = 12;
		$config['base_url'] = base_url('category/'.$slug);
		$config['total_rows'] = $this->db->from('p_product as a')
								->select('count(*) as num')
								->join('p_category', 'a.category = p_category.id','left')		
								->order_by('a.id', 'DESC')
								->where('p_category.slug',$slug)
								->where('a.status',1)
								->where('a.stock !=','out')
								->where('a.deleted_at IS NULL',null)
								->where('p_category.deleted_at IS NULL',null)
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
		->select("a.name,				
					a.image,
					a.price1,
					a.price2,
					a.price3,
					a.stock,
					a.status,
					a.slug,
					p_category.name as category,
                   '' as size,
                   '' as color,
                    a.special_text,
                    a.discount")
		->join('p_category', 'a.category = p_category.id','left')		
		->order_by('a.id', 'DESC')
		->where('p_category.slug',$slug)
		->where('a.status',1)
		->where('a.stock !=','out')
		->where('a.deleted_at IS NULL',null)
		->where('p_category.deleted_at IS NULL',null)	
		->get('p_product as a',$per_page,$per_page*$page)
		->result_array();	
		return $result;		
	}
}

/* End of file Category.php */
/* Location: ./application/models/Category.php */