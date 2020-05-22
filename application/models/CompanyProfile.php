<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CompanyProfile extends CI_Model { 
    public function label()
    {        
        $result = $this->db->from('widget_data')
                    ->where('widget.name','Widget Label')
                    ->join('widget','widget.id = widget_data.widget_id')
                    ->select('widget_data.name,widget_data.description')
                    ->get()
                    ->result_array();
        return $result;
    }
    // public function component($value='')
    // {    
    //     $result = $this->db->from('web_component')
    //                     ->select('name,status')
    //                     ->get()
    //                     ->result_array();
    //     return $result;
    // }
    public function profile()
    {    
        $result = $this->db->from('profile_website')
                            ->limit(1)
                            ->get()
                            ->result_array();
        if ($result) {
            return $result[0];
        }else{
            return false;
        }
    }
    public function WebColor()
    {
        $result = $this->db->from('template_front')
                            ->limit(1)
                            ->get()
                            ->result_array();
        if ($result) {
            return $result[0];
        }else{
            return false;
        }    
    }

    public function menu()
    {    
        $result = $this->db->from('menu')
                            ->select('id_parent,
                                        judul,
                                        link,
                                        posisi,
                                        local_link')
                            ->order_by('posisi','ASC')
                            ->get()
                            ->result_array();
        return $result;
        
    }

    public function menuSub($id_parent='')
    {        
        $result = $this->db->from('product')
                        ->select('id,id_kategori,judul,slug')
                        ->where('id_kategori',$id_parent)
                        ->where('status',1)
                        ->get()
                        ->result_array();
        return $result;
        
    }

    public function contact($value='')
    {
        $result = $this->db->from('kontak')
                            ->select('judul,
                                        kontak,
                                        gambar,
                                        role')
                            ->order_by('id','ASC')
                            ->get()
                            ->result_array();            
        return $result;    
    }

    public function SocialMedia()
    {
        $result = $this->db->from('social_media')
                    ->select('judul,
                                link,
                                gambar')
                    ->order_by('id','ASC')
                    ->get()
                    ->result_array();
        return $result;
    }

    public function footer()
    {    
        $result = $this->db->from('menu_footer')
                    ->select('judul,link')
                    ->order_by('id','ASC')
                    ->get()
                    ->result_array();
        return $result;
    }
    public function footerData()
    {    
        $result = $this->db->from('footer')
                    ->select('posisi,
                            role,
                            judul,
                            id_galeri_kategori')
                    ->order_by('id','ASC')
                    ->get()
                    ->result_array();
        return $result;
    }
    public function category()
    {    
        $result = $this->db->from('kategori')
            ->get()
            ->result_array();
        return $result;
    }

    public function SpecialOffer()
    {  
        $result = $this->db->from('special_offer')
                                ->join('product','product.id = special_offer.id_product', 'left')
                                ->join('page','page.id = special_offer.id_page','left')
                                ->order_by('product.id','DESC')
                                ->select('product.judul as product_judul,
                                            product.slug as product_slug,
                                            page.judul as page_judul,
                                            page.slug as page_slug')
                                ->get()
                                ->result_array();
        return $result;
    }
    public function footerSlider($id='')
    {    
        $result = $this->db->from('galeri')
                    ->where('id_galeri_kategori',$id)
                    ->limit(6)
                    ->get()
                    ->result_array();
        return $result;
    }
    public function footerCategory($id='')
    {    
        $result = $this->db->from('product')
                    ->where('id_kategori',$id)                
                    ->get()
                    ->result_array();
        return $result;
    }
    public function footerBlog()
    {        
        $result = $this->db->from('blog_kategori')
                    ->select('judul,slug')
                    ->order_by('id','DESC')
                    ->limit(6)
                    ->get()
                    ->result_array();
        return $result;
    }
}