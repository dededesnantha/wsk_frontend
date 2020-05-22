<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sidebar extends CI_Model {	
	public function sidebar1()
	{
		$result = $this->db->from('sidebar')
					->select('role,
								judul,
								link,
								category')
					->order_By('id','ASC')
					->get()
					->result_array();
		return $result;
	}

	public function category()
	{		 
		$result = $this->db->from('kategori')
							->select('judul,
										slug,
										gambar')
							->order_by('judul','ASC')
							->get()
							->result_array();
		return $result;
	}
	public function SpecialOffer()
    {  
        $result = $this->db->from('special_offer')
                                ->select('product.judul as product_judul,
                                            product.slug as product_slug,
                                            product.gambar as product_gambar,
                                            page.judul as page_judul,
                                            page.slug as page_slug,
                                            page.gambar as page_gambar,
                                            ')
                                ->join('product','product.id = special_offer.id_product','left')
                                ->join('page','page.id = special_offer.id_page','left')
                                ->order_by('special_offer.position','ASC')
                                ->get()
                                ->result_array();
        return $result;
    }
    public function product($id='')
    {    
    	$result = $this->db->from('product')
			    	->select('judul,
				    			slug,
				    			gambar')
			    	->where('id_blog_kategori',$id)
			    	->where('status',1)
			    	->order_by('judul','ASC')
			    	->get()
			    	->result_array();
		return $result;
    }
    public function blog()
    {  
    	$result = $this->db->from('blog')
    				->select('judul,
    							slug,
    							gambar')
    				->where('status',1)
    				->order_by('id','DESC')
    				->limit(7)
    				->get()
    				->result_array();
    	return $result;
    }
    public function sidebar()
    {
        $result['blog'] = $this->db->from('blog')
                    ->select('judul,
                                slug,
                                gambar')
                    ->where('status',1)
                    ->order_by('id','DESC')
                    ->limit(7)
                    ->get()
                    ->result_array();

    	$category = $this->db->from('kategori')
    						->select('id,
									judul,
									slug')
    						->order_by('judul','ASC')
    						->get()
    						->result_array();
    	$menu_product = $this->db->from('product')
    						->select('id_kategori,
    									judul,
    									slug,
    									gambar')
    						->where_in('id_kategori',array_map(function($n){return $n['id']; }, $category))
    						->where('status',1)
    						->order_by('judul','ASC')
    						->get()
                            ->result_array();   

        $result['product'] = [];
        for ($i=0; $i < count($menu_product); $i++) {
            if (!array_key_exists(array_map(function($n){return $n['slug']; }, $category)[array_search($menu_product[$i]['id_kategori'], array_map(function($n){return $n['id']; }, $category))], $result['product'])) {
                $result['product'][array_map(function($n){return $n['slug']; }, $category)[array_search($menu_product[$i]['id_kategori'], array_map(
                    function($n){return $n['id']; }, $category))]] = [];
                $result['product'][array_map(function($n){return $n['slug']; }, $category)[array_search($menu_product[$i]['id_kategori'], array_map(function($n){return $n['id']; }, $category))]]['name'] = '';
                $result['product'][array_map(function($n){return $n['slug']; }, $category)[array_search($menu_product[$i]['id_kategori'], array_map(function($n){return $n['id']; }, $category))]]['data'] = [];
            }
            $result['product'][array_map(function($n){return $n['slug']; }, $category)[array_search($menu_product[$i]['id_kategori'], array_map(function($n){return $n['id']; }, $category))]]['name'] = array_map(function($n){return $n['judul']; }, $category)[array_search($menu_product[$i]['id_kategori'], array_map(function($n){return $n['id']; }, $category))];            
            array_push($result['product'][array_map(function($n){return $n['slug']; }, $category)[array_search($menu_product[$i]['id_kategori'], array_map(function($n){return $n['id']; }, $category))]]['data'], $menu_product[$i]);            
        }
        usort($result['product'],function($a,$b){ return strcmp($a['name'], $b['name']); });

        return $result;
    }

    public function sidebar_blog()
    {
         $result['blog'] = $this->db->from('blog')
                    ->select('judul,
                                slug,
                                gambar')
                    ->where('status',1)
                    ->order_by('id','DESC')
                    ->limit(7)
                    ->get()
                    ->result_array();

        $category = $this->db->from('kategori')
                            ->select('id,
                                    judul,
                                    slug')
                            ->order_by('judul','ASC')
                            ->get()
                            ->result_array();
        $menu_product = $this->db->from('product')
                            ->select('id_kategori,
                                        judul,
                                        slug,
                                        gambar')
                            ->where_in('id_kategori',array_map(function($n){return $n['id']; }, $category))
                            ->where('status',1)
                            ->order_by('judul','ASC')
                            ->get()
                            ->result_array();   

        $result['product'] = [];
        for ($i=0; $i < count($menu_product); $i++) {
            if (!array_key_exists(array_map(function($n){return $n['slug']; }, $category)[array_search($menu_product[$i]['id_kategori'], array_map(function($n){return $n['id']; }, $category))], $result['product'])) {
                $result['product'][array_map(function($n){return $n['slug']; }, $category)[array_search($menu_product[$i]['id_kategori'], array_map(
                    function($n){return $n['id']; }, $category))]] = [];
                $result['product'][array_map(function($n){return $n['slug']; }, $category)[array_search($menu_product[$i]['id_kategori'], array_map(function($n){return $n['id']; }, $category))]]['name'] = '';
                $result['product'][array_map(function($n){return $n['slug']; }, $category)[array_search($menu_product[$i]['id_kategori'], array_map(function($n){return $n['id']; }, $category))]]['data'] = [];
            }
            $result['product'][array_map(function($n){return $n['slug']; }, $category)[array_search($menu_product[$i]['id_kategori'], array_map(function($n){return $n['id']; }, $category))]]['name'] = array_map(function($n){return $n['judul']; }, $category)[array_search($menu_product[$i]['id_kategori'], array_map(function($n){return $n['id']; }, $category))];            
            array_push($result['product'][array_map(function($n){return $n['slug']; }, $category)[array_search($menu_product[$i]['id_kategori'], array_map(function($n){return $n['id']; }, $category))]]['data'], $menu_product[$i]);            
        }
        usort($result['product'],function($a,$b){ return strcmp($a['name'], $b['name']); });

        return $result;
    }


}

/* End of file Sidebar.php */
/* Location: ./application/models/Sidebar.php */