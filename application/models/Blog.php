<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Model {
	public function single($slug)
	{
		$result = $this->db->from('blog')
                            ->join('blog_kategori','blog.id_blog_kategori = blog_kategori.id')
                            ->select('blog_kategori.id as id_cat,
                            			blog.id,
                            			blog.view,
                            			blog.judul,
                            			blog.gambar,
                            			blog.deskripsi,
                            			blog_kategori.judul as judul_cat,
                            			blog.seo_judul,
                            			blog.seo_kata_kunci,
                            			blog.seo_deskripsi,
                            			blog.slug,
                            			blog_kategori.slug as slug_cat,
                            			blog.created_at,
                            			blog.updated_at')
                            ->where('blog.slug',$slug)
                            ->where('blog.status',1)
                            ->get()
                            ->result_array();
        if ($result) {
        	return $result[0];        
        }else{
        	$result = false;
        }
	}
	public function tag($id='')
	{
		$result = $this->db->from('all_tag')
                        ->join('tag','all_tag.id_tag = tag.id')
                        ->select('tag.judul,
                        			tag.slug')
                        ->where('all_tag.id_blog',$id)
                        ->order_by('tag.judul','ASC')
                        ->get()                        
						->result_array();
        return $result;
    }
	public function related($id_cat,$id_product)
	{
		$result = $this->db->from('blog')
							->select('judul,
										gambar,
										slug,
                                        LEFT(deskripsi,400) as deskripsi')
							->where('id_blog_kategori',$id_cat)
							->where('id !=',$id_product)
							->where('status',1)
							->limit(3)
							->order_by('id','DESC')
							->get()
							->result_array();
        return $result;
    }
	public function review($id='')
	{
		$result = $this->db->from('blog_review')
                            ->select('SUM(blog_review.count) as review_total,count(*) as review_count')           
                            ->where('blog_review.id_blog',$id)
                            ->get()
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
    public function ListBlog($slug='',$page=1)
    {   
        if ($page <= 0) {
            $page = 0;
        }else{
            $page = $page-1;
        }
        $this->load->library('pagination');
        $per_page = 0;
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
}

/* End of file Blog.php */
/* Location: ./application/models/Blog.php */