<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Model {
	// new
	public function home()
	{
		$result = $this->db->from('home_setting')
					->order_by('posisi','ASC')
					->where('status',1)
					->get()
					->result_array();
		return $result;
	}
	public function slider()
	{	
		$result = $this->db->from('slider')
					->order_by('position','ASC')
					->get()
					->result_array();
		return $result;
	}

	public function special()
	{

		$result = $this->db->from('special_offer')
							->join('product','product.id = special_offer.id_product','left')
                            ->join('page','page.id = special_offer.id_page','left')
                            ->select('special_offer.id_product as id_product,
                            			special_offer.id_page as id_page,
                            			product.judul as product_judul,
		                            	product.deskripsi as product_deskripsi,
			                            product.slug as product_slug,
			                            product.gambar as product_gambar,
			                            product.price as product_price,
			                            page.judul as page_judul,
		                                page.deskripsi as page_deskripsi,
		                                page.slug as page_slug,
		                                page.gambar as page_gambar')
                            ->order_by('special_offer.position','ASC')
                            ->get()
                            ->result_array();
		return $result;
	}
	public function ratting($temp_id_product)
	{
		$review = $this->db->from('product_review')
					->join('product','product.id = product_review.id_product')
					->select('SUM(product_review.count) as review_total,count(*) as review_count')
					->where('product_review.id_product', $temp_id_product)
					->group_by('product_review.id_product')
					->get()
					->result_array();
			
		foreach($review as $val){
			$temp[$val['id_product']] = array(
				'review_total' => round($val['review_total'] / $val['review_count'],1),
				'review_count' => $val['review_count']
			);
		}                
		// foreach ($data[$row['name']] as $keys => $valb) {
		// 	if($valb['id_product']){
		// 		$data[$row['name']][$keys]['review_total'] = $temp[$valb['id_product']]['review_total'];
		// 		$data[$row['name']][$keys]['review_count'] = $temp[$valb['id_product']]['review_count'];
		// 	}
		// }
	}
	public function product()
	{	
		$result = $this->db->from('blog')
                    ->select('judul,
                    		seo_deskripsi,
                    		gambar,
                    		slug')
                    ->where('status',1)
                    ->order_by('id','DESC')
                    ->limit(6)
                    ->get()
					->result_array();                    
		return $result;                                
	}

	 public function get_authors($limit, $start) 
	 {
        $this->db->limit($limit, $start);
        $query = $this->db->get($this->table);

        return $query->result();
    }


	public function transport()
	{
		$result = $this->db->from('page')
					->select('judul,
							gambar,
							deskripsi')
					->where('status',1)
					->where('display','transport')
					->get()
					->result_array();
		return $result;
	}
	public function review()
	{
		$result = $this->db->from('review')					
					->where('deleted_at IS NULL',null)
					->where('approve',1)
					->order_by('id','DESC')
					->limit(6)
					->get()
					->result_array();
		return $result;
	}
	public function booking()
	{	
		$result = $this->db->from('kategori')
					->select('id,
							judul,
							slug')
					->order_by('judul','ASC')
					->get()
					->result_array();
		return $result;
	}
	public function bookingData($id='')
	{
		$result = $this->db->from('product')				
				->select('judul,
					slug')
				->where('id_kategori',$id)
				->where('status',1)
				->get()
				->result_array();
		return $result;
	}
	public function search($search='',$page=1)
	{
		if ($page <= 0) {
            $page = 0;
        }else{
            $page = $page-1;
        }
        $this->load->library('pagination');
        $per_page = 14;
        $config['total_rows'] = $this->db->from('product')
                                ->select('count(*) as num')                             
                                ->where('judul LIKE','%'.$search.'%')
        						->get()
                                ->result_array()[0]['num'];
        $config['base_url'] = base_url('search'.'?search='.$search);                                
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
                        ->where('judul LIKE','%'.$search.'%')                    
	        			->get('product',$per_page,$per_page*$page)
	                    ->result_array();   
        return $result;   
	}
	public function BookingList($value='')
	{
		$category = $this->db->from('kategori')
						->select('id,
								judul,
								slug')
						->order_by('judul','ASC')
						->get()
						->result_array();
		$result = array();
        foreach ($category as $row) {
            $result[$row['slug']]['name'] = $row['judul'];
            $result[$row['slug']]['slug'] = $row['slug'];
            $result[$row['slug']]['data'] = $this->db->from('product')
            										->select('judul,slug')
            										->where('id_kategori',$row['id'])
            										->where('status',1)
            										->get()
            										->result_array();
        }
        return $result;
	}
	public function list_review($page=1)
	{
		if ($page <= 0) {
            $page = 0;
        }else{
            $page = $page-1;
        }
        $this->load->library('pagination');
        $per_page = 14;
        $config['total_rows'] = $this->db->from('review')
                                ->select('count(*) as num')                                                            
                                ->where('deleted_at IS NULL',null)
        						->where('approve',1)
        						->get()
                                ->result_array()[0]['num'];
        $config['base_url'] = base_url('review.html');                                
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
        						->where('deleted_at IS NULL',null)
        						->where('approve',1)
        						->order_by('id','DESC')        					
	        			->get('review',$per_page,$per_page*$page)
	                    ->result_array();   
        return $result;   
	}

	public function blog()
	{
		$retrun = $this->db->from('blog')
							->select('id,
                                        judul,
										gambar,
										slug,
                                        LEFT(deskripsi,400) as deskripsi, created_at')
							->where('status',1)
							->limit(4)
							->order_by('id','DESC')
							->get()
							->result_array();
		return $retrun; 
	}
	public function blog_list($slug='', $page = 1)
	{
		if ($page <= 0) {
            $page = 0;
        }else{
            $page = $page-1;
        }

		$this->load->library('pagination');
        $per_page = 4;

        if ($slug) {
            $result['seo'] = $this->db->from('blog_kategori')
                                        ->select('judul,
                                                seo_judul,
                                                seo_kata_kunci,
                                                seo_deskripsi')
                                        ->where('slug',$slug)
                                        ->limit(1)
                                        ->get()                                    
                                        ->result_array()[0]; 
            $config['base_url'] = base_url('blog/'.$slug);
        }else{    
            $result['seo'] = $this->db->from('profile_website')
                            ->limit(1)
                            ->get()
                            ->result_array()[0];
            $config['base_url'] = base_url('blog');        
        }

		$config['total_rows'] = $this->db->from('blog')
                                ->select('count(*) as num')                                
                                ->join('blog_kategori','blog.id_blog_kategori = blog_kategori.id')
                                ->where('blog.status',1);
                                if ($slug) {
                                	$config['total_rows'] = $config['total_rows']->where('blog_kategori.slug',$slug);
                                }
							$config['total_rows'] = $config['total_rows']->get()
                                ->result_array()[0]['num'];
        $config['base_url'] = base_url('/');         
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
                    ->join('blog_kategori','blog.id_blog_kategori = blog_kategori.id')
                    ->where('blog.status',1)
                    ->select('blog.id,
                                blog.judul,
                                blog.gambar,
                                LEFT(blog.deskripsi,200) as deskripsi,
                                blog.slug')
                    ->order_by('blog.id','DESC');
        if ($slug) {
            $result['data'] = $result['data']->where('blog_kategori.slug',$slug);
        }
        $result['data'] = $result['data']->get('blog',$per_page,$per_page*$page)
                    ->result_array();   
        return $result;
	}
	public function ListBlog($page=1)
    {   
        if ($page <= 0) {
            $page = 0;
        }else{
            $page = $page-1;
        }
        $this->load->library('pagination');
        $per_page = 4;
        $config['total_rows'] = $this->db->from('blog')
                                ->select('count(*) as num')                                
                                ->join('blog_kategori','blog.id_blog_kategori = blog_kategori.id')
                                ->where('blog.status',1);
        
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
         
    }

}

/* End of file Home.php */
/* Location: ./application/models/Home.php */