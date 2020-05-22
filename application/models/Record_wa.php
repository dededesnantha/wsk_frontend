<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Record_wa extends CI_Model {
    public function record_wa()
    {
       $time_min_1_m = date('Y-m-d H:i:s',strtotime('-1 minutes',time()));       
            $count = $this->db->from('record_wa')
                        ->select('count(*) as count')
                        ->where('ip',$this->input->ip_address())
                        ->where('referer',$this->agent->referrer())
                        ->where('DATE(created_at) BETWEEN',$time_min_1_m.' and '.date('Y-m-d H:i:s'))
                        ->get()
                        ->result_array()[0]['count'];

        return $count;
    }

}

 ?>