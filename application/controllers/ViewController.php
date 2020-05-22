<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class ViewController extends CI_Controller {
    public function __construct()
    {
        parent::__construct();   
        $this->load->library(['user_agent','session','email']);               
    }
    public function index()
    {
        $this->load->model('Pengumuman');
        $data['Pengumuman'] = $this->Pengumuman->Pengumuman_sekolah();
        $data['kelas'] = $this->Pengumuman->Kelas();

        $data['pengumuman'] = "all";

        $this->load->view('inc/header_pengumuman',$data);
        $this->load->view('home_pengumuman');
        $this->load->view('inc/footer_pengumuman');
    }

    public function single_pengumuman()
    {
        $slug = urldecode($this->uri->segment(2));
        if ($slug == null) {
            return false;
        }

        $this->load->model('Pengumuman');
        $kelas = $this->Pengumuman->id_kelas($slug);
        if ($kelas) {
            $data['kelas'] = $this->Pengumuman->Kelas();

            foreach ($kelas as $clas) {
                $data['kelas_name'] = $clas['name'];
                $data['single_kelas'] = $this->Pengumuman->Pengumuman_kelas($clas['id']);
            }

            $data['pengumuman'] = "class";
            $this->load->view('inc/header_pengumuman',$data);
            $this->load->view('single_pengumuman');
            $this->load->view('inc/footer_pengumuman');

        }else{
            $data['kelas'] = $this->Pengumuman->Kelas();
            $data['pengumuman'] = "";
            $this->load->view('inc/header_pengumuman',$data);
            $this->load->view('inc/footer_pengumuman');
        }
    }
}