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
    public function id_kelas($slug)
    {
        $result = $this->db->from('kelas')        
        ->select('id,name')
        ->where('name',$slug)
        ->get()
        ->result_array();
        return $result;
    }
    public function Pengumuman_kelas($id)
    {

        $result = $this->db->from('pengumuman')       
        ->select('title,
            content,
            target_type,
            target_id,
            publish,
            end')
        ->where('target_id',$id)
        ->where('target_type','class')
        ->get()
        ->result_array();
        return $result;
    }
}

/* End of file Pengumuman.php */
/* Location: ./application/models/Pengumuman.php */