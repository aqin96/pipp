<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Gascoding
 * Date: 27/11/2018
 * Time: 16:57
 */
class Dashboard extends CI_Controller
{
    var $userSession;
    var $navbarTitle;
    public function __construct()
    {
        parent::__construct();
        $this->userSession = $this->session->userdata('iduser');
        $iduser = $this->session->userdata('iduser');
        $this->navbar_Title = "Dashboard";
        $this->load->model('otentikasi_model');
        $this->load->model('master_model');
        
        if($iduser == '') {
            redirect('auth');
        }
        else {

        }

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

    public function editprofil(){
        $this->navbarTitle = "Profil";
        $iduser = $this->session->userdata('iduser');
        $data['user'] = $this->master_model->getDataUserByID($iduser)->result();
        $data['navbarTitle'] = $this->navbarTitle;
        $this->load->view('parts/header');
        $this->load->view('parts/sidebar',$data);
        $this->load->view('editprofil',$data);
        $this->load->view('parts/footer');

    }

    function updateprofil() {
        $iduser = $this->session->userdata('iduser');
        $nmuser = $this->input->post('nmuser');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $pass = md5($password);

        if($password != '') {
        $this->db->set('nmuser', $nmuser);
        $this->db->set('username', $username);
        $this->db->set('password', $pass);
        $this->db->where('iduser', $iduser);
        $this->db->update('user');
        }
        else {
        $this->db->set('nmuser', $nmuser);
        $this->db->set('username', $username);
        $this->db->where('iduser', $iduser);
        $this->db->update('user');
        }
        $this->session->set_flashdata("updated","updated");
        redirect('./');
    }

}