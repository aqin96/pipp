<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Gascoding
 * Date: 06/12/2018
 * Time: 10:58
 */
class publish extends CI_Controller
{
    var $userSession;
    var $kapal = "kapal"; 
    var $pelabuhan = "pelabuhan"; 
    var $ikan = "ikan"; 
    var $jenis_perbekalan = "jenis_perbekalan"; 
    var $supplier = "supplier"; 
    var $gallerypath;

    function __construct()
    {
        parent::__construct();

        $iduser = $this->session->userdata('iduser');
        $this->load->model('master_model');
        $this->navbar_Title = "Master";
    }

    public function index(){
        $this->navbarTitle = "404";
        $data['navbarTitle'] = $this->navbarTitle;
        $this->load->view('404');
    }

    public function kapal(){
        $this->navbarTitle = "Kapal";
        $data['kapal'] = $this->master_model->getDataKapal()->result();
        $data['navbarTitle'] = $this->navbarTitle;
        $this->load->view('parts/header');
        $this->load->view('parts/sidebar',$data);
        $this->load->view('kapal_publish',$data);
        $this->load->view('parts/footer');

    }

    public function pelabuhan(){
        $this->navbarTitle = "Pelabuhan";
        $data['pelabuhan'] = $this->master_model->getDataPelabuhan()->result();
        $data['navbarTitle'] = $this->navbarTitle;
        $this->load->view('parts/header');
        $this->load->view('parts/sidebar',$data);
        $this->load->view('pelabuhan_publish',$data);
        $this->load->view('parts/footer');

    }

    public function ikan(){
        $this->navbarTitle = "Ikan";
        $data['ikan'] = $this->master_model->getDataIkan()->result();
        $data['navbarTitle'] = $this->navbarTitle;
        $this->load->view('parts/header');
        $this->load->view('parts/sidebar',$data);
        $this->load->view('ikan_publish',$data);
        $this->load->view('parts/footer');

    }

    public function jenis_perbekalan(){
        $this->navbarTitle = "Jenis Perbekalan";
        $data['satuan'] = $this->master_model->getDataSatuan()->result();
        $data['jenis_perbekalan'] = $this->master_model->getDataJenisPerbekalan()->result();
        $data['navbarTitle'] = $this->navbarTitle;
        $this->load->view('parts/header');
        $this->load->view('parts/sidebar',$data);
        $this->load->view('jenis_perbekalan_publish',$data);
        $this->load->view('parts/footer');

    }

    public function supplier(){
        $this->navbarTitle = "Supplier";
        $data['supplier'] = $this->master_model->getDataSupplier()->result();
        $data['navbarTitle'] = $this->navbarTitle;
        $this->load->view('parts/header');
        $this->load->view('parts/sidebar',$data);
        $this->load->view('supplier_publish',$data);
        $this->load->view('parts/footer');

    }

    public function listberita($page){
        $this->navbarTitle = "Berita";
        $batas = 6;
        $data['berita'] = $this->master_model->getDataBeritaPage($page,$batas)->result();
        $data['totalberita'] = $this->master_model->getDataBerita()->num_rows();
        $data['navbarTitle'] = $this->navbarTitle;
        $this->load->view('parts/header');
        $this->load->view('parts/sidebar',$data);
        $this->load->view('listberita',$data);
        $this->load->view('parts/footer');

    }

    public function detailberita($idberita){

        $this->navbarTitle = "Berita";
        $data['berita'] = $this->master_model->getSingleBerita($idberita)->result();
        $data['navbarTitle'] = $this->navbarTitle;
        $this->load->view('parts/header');
        $this->load->view('parts/sidebar',$data);
        $this->load->view('blog-post',$data);
        $this->load->view('parts/footer');
    }
    
}