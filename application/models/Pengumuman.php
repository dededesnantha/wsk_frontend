<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman extends CI_Model {
	public function Pengumuman_sekolah()
        {
                $result = $this->db->from('pengumuman')        
                            ->select('title,
                                        content,
                                        publish,
                                        end')
                            ->where('target_type','public')
                            ->get()
                            ->result_array();
                return $result;
        }
    public function Kelas()
        {
                $result = $this->db->from('kelas')        
                            ->select('id,name')
                            ->get()
                            ->result_array();
                return $result;
        }
    
        // public function review($id='')
        // {        
        //         $result = $this->db->from('page_review')
        //                     ->select('SUM(page_review.count) as review_total,count(*) as review_count')           
        //                     ->where('page_review.id_page',$id)
        //                     ->get()
        //                     ->result_array();
        //         return $result;
        // }
}

/* End of file Page.php */
/* Location: ./application/models/Page.php */