<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Model {
	public function single($slug='')
	{
		$result = $this->db->from('product')		
                            ->join('kategori','product.id_kategori = kategori.id')
                            ->select('kategori.id as id_cat,
                            			product.id,
                            			product.view,
                            			product.judul,
                            			product.gambar,
                            			product.deskripsi,
                            			kategori.judul as judul_cat,
                            			product.seo_judul,
                            			product.seo_kata_kunci,
                            			product.seo_deskripsi,
                            			product.slug,
                            			kategori.slug as slug_cat,
                            			product.updated_at,
                            			product.created_at,
                            			product.price')
                            ->where('product.slug',$slug)
                            ->where('product.status',1)
                            ->get()
                            ->result_array();
        if ($result) {
        	return $result[0];
        }else{
        	return false;
        }         
        return $result;
	}
	public function tag($id='')
	{
		$result = $this->db->from('all_tag')
                                ->join('tag','all_tag.id_tag = tag.id')
                                ->select('tag.judul,tag.slug')
                                ->where('all_tag.id_product',$id)
                                ->order_by('tag.judul','ASC')
                                ->get()
                            	->result_array();

        return $result;

	}
	public function slider($id='')
	{
		$result = $this->db->from('galeri')
                                ->where('id_product',$id)
                                ->select('judul,gambar')
                                ->order_by('id','DESC')
                                ->get()
                                ->result_array();

        return $result;
	}
	public function related($id_cat,$id_product)
	{
		$result = $this->db->from('product')
						->select('judul,gambar,slug')
						->where('id_kategori',$id_cat)
						->where('id !=',$id_product)
						->where('status',1)
						->limit(3)
						->order_by('id','DESC')
						->get()
						->result_array();

        return $result;
	}
	public function review($slug='')
	{
		$result = $this->db->from('product_review')
                                ->join('product','product.id = product_review.id_product')
                                ->select('SUM(product_review.count) as review_total,count(*) as review_count')
                                ->where('product.slug',$slug)
                                ->get()
                                ->result_array();

        return $result;
	}
	public function WebReview()
	{
		$result = $this->db->from('review')
							->where('deleted_at',null)
							->where('approve',1)
							->order_by('id','DESC')
							->limit(5)
							->get()
							->result_array();	

        return $result;
	}
	public function ListPage($id='')
	{
		$result = $this->db->from('list_page_on_product')
                                    ->join('page','list_page_on_product.page_id = page.id')
                                    ->where('list_page_on_product.product_id',$id)
                                    ->where('page.status',1)
                                    ->select('page.judul,page.slug,page.gambar,LEFT(page.deskripsi,200) as deskripsi')
                                    ->get()
                                    ->result_array();

        return $result;
	}
	public function widget($id='')
	{
		$result = $this->db->from('product_widget')
                                    ->select('widget.name,widget_data.description')
                                    ->join('widget_data','product_widget.widget_data_id = widget_data.id')
                                    ->join('widget','widget_data.widget_id = widget.id')
                                    ->where('product_widget.product_id',$id)
                                    ->get()
                                    ->result_array();
        return $result;
	}
    public function ListCategory($slug='',$page=1)
    {        
        if ($page <= 0) {
            $page = 0;
        }else{
            $page = $page-1;
        }
        $this->load->library('pagination');
        $per_page = 14;
        if ($slug) {
            $result['seo'] = $this->db->from('kategori')
                                        ->select('judul,
                                                seo_judul,
                                                seo_kata_kunci,
                                                seo_deskripsi,
                                                gambar')
                                        ->where('slug',$slug)
                                        ->limit(1)
                                        ->get()                                    
                                        ->result_array()[0]; 
            $config['base_url'] = base_url('category/'.$slug);
        }else{    
            $result['seo'] = $this->db->from('profile_website')
                            ->limit(1)
                            ->get()
                            ->result_array()[0];
            $config['base_url'] = base_url('category');        
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
                    ->join('kategori','product.id_kategori = kategori.id')
                    ->select('product.judul,
                                LEFT(product.deskripsi,400) as deskripsi,
                                product.gambar,
                                product.slug,
                                product.price')
                    ->order_by('product.id','DESC')
                    ->where('product.status',1);
        if ($slug) {
            $result['data'] = $result['data']->where('kategori.slug',$slug);
        }
        $result['data'] = $result['data']->get('product',$per_page,$per_page*$page)
                    ->result_array();   
        return $result;   
    }

    
}

/* End of file Product.php */
/* Location: ./application/models/Product.php */