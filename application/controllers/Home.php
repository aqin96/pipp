<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Gascoding
 * Date: 27/11/2018
 * Time: 16:57
 */
class Home extends CI_Controller
{
    var $userSession;
    var $navbarTitle;
    public function __construct()
    {
        parent::__construct();
        $this->navbar_Title = "Dashboard";
        $this->load->model('otentikasi_model');
        $this->load->model('master_model');

    }

    public function index(){
        $this->navbarTitle = "Home";
        $data['berita'] = $this->master_model->getDataBerita()->result();
        $data['ikan'] = $this->master_model->get10DataIkan()->result();
        $data['nama_ikan'] = $this->master_model->getNamaIkanTangkap()->result();
        $data['harga_ikan'] = $this->master_model->getHargaTangkap()->result();
        $data['navbarTitle'] = $this->navbarTitle;
        $this->load->view('parts/header');
        $this->load->view('parts/sidebar',$data);
        $this->load->view('dashboard',$data);
        $this->load->view('parts/footer');

    }

}