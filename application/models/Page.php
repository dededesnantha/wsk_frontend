<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Model {
	public function single($slug)
        {
                $result = $this->db->from('page')        
                            ->select('page.id,
                                        page.judul,
                                        page.view,
                                        page.gambar,
                                        page.deskripsi,
                                        page.seo_judul,
                                        page.seo_kata_kunci,
                                        page.seo_deskripsi,
                                        page.slug,
                                        page.created_at,
                                        page.updated_at')
                            ->where('page.slug',$slug)
                            ->where('page.status',1)
                            ->get()
                            ->result_array();
                if ($result) {
                    return $result[0];
                }else{
                    $result = false;
                }

        }
        public function review($id='')
        {        
                $result = $this->db->from('page_review')
                            ->select('SUM(page_review.count) as review_total,count(*) as review_count')           
                            ->where('page_review.id_page',$id)
                            ->get()
                            ->result_array();
                return $result;
        }
}

/* End of file Page.php */
/* Location: ./application/models/Page.php */