<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Gascoding
 * Date: 06/12/2018
 * Time: 10:58
 */
class master extends CI_Controller
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

        if ($iduser != "") {

            $this->load->model('master_model');
            $this->navbar_Title = "Master";

        } else {
            redirect('auth');
        }
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
        $this->load->view('kapal',$data);
        $this->load->view('parts/footer');

    }

    public function addkapal(){

        $data['nmkapal'] = $this->input->post('nmkapal');
        $data['status'] = $this->input->post('status');
        $this->db->insert('kapal', $data);
        $this->session->set_flashdata("inserted","inserted");
        redirect('master/kapal');
    }

    public function updatekapal(){

        $idkapal = $this->input->post('idkapal');
        $nmkapal = $this->input->post('nmkapal');
        $status = $this->input->post('status');
        $this->db->set('nmkapal', $nmkapal);
        $this->db->set('status', $status);
        $this->db->where('idkapal', $idkapal);
        $this->db->update('kapal');
        $this->session->set_flashdata("updated","updated");
        redirect('master/kapal');
    }

    public function deletekapal($idkapal){

        $this->db->delete('kapal', array('idkapal' => $idkapal));
        $this->session->set_flashdata("deleted","deleted");
        redirect('master/kapal');
    }

    public function pelabuhan(){
        $this->navbarTitle = "Pelabuhan";
        $data['pelabuhan'] = $this->master_model->getDataPelabuhan()->result();
        $data['navbarTitle'] = $this->navbarTitle;
        $this->load->view('parts/header');
        $this->load->view('parts/sidebar',$data);
        $this->load->view('pelabuhan',$data);
        $this->load->view('parts/footer');

    }

    public function addpelabuhan(){

        $data['nmpelabuhan'] = $this->input->post('nmpelabuhan');
        $data['alamat'] = $this->input->post('alamat');
        $this->db->insert('pelabuhan', $data);
        $this->session->set_flashdata("inserted","inserted");
        redirect('master/pelabuhan');
    }

    public function updatepelabuhan(){

        $idpelabuhan = $this->input->post('idpelabuhan');
        $nmpelabuhan = $this->input->post('nmpelabuhan');
        $alamat = $this->input->post('alamat');
        $this->db->set('nmpelabuhan', $nmpelabuhan);
        $this->db->set('alamat', $alamat);
        $this->db->where('idpelabuhan', $idpelabuhan);
        $this->db->update('pelabuhan');
        $this->session->set_flashdata("updated","updated");
        redirect('master/pelabuhan');
    }

    public function deletepelabuhan($idpelabuhan){

        $this->db->delete('pelabuhan', array('idpelabuhan' => $idpelabuhan));
        $this->session->set_flashdata("deleted","deleted");
        redirect('master/pelabuhan');
    }

    public function ikan(){
        $this->navbarTitle = "Ikan";
        $data['ikan'] = $this->master_model->getDataIkan()->result();
        $data['navbarTitle'] = $this->navbarTitle;
        $this->load->view('parts/header');
        $this->load->view('parts/sidebar',$data);
        $this->load->view('ikan',$data);
        $this->load->view('parts/footer');

    }

    public function addikan(){

        $data['nmikan'] = $this->input->post('nmikan');
        $data['harga'] = $this->input->post('harga');
        $this->db->insert('ikan', $data);
        $this->session->set_flashdata("inserted","inserted");
        redirect('master/ikan');
    }

    public function updateikan(){

        $idikan = $this->input->post('idikan');
        $nmikan = $this->input->post('nmikan');
        $harga = $this->input->post('harga');
        $this->db->set('nmikan', $nmikan);
        $this->db->set('harga', $harga);
        $this->db->where('idikan', $idikan);
        $this->db->update('ikan');
        $this->session->set_flashdata("updated","updated");
        redirect('master/ikan');
    }

    public function deleteikan($idikan){

        $this->db->delete('ikan', array('idikan' => $idikan));
        $this->session->set_flashdata("deleted","deleted");
        redirect('master/ikan');
    }

    public function jenis_perbekalan(){
        $this->navbarTitle = "Jenis Perbekalan";
        $data['satuan'] = $this->master_model->getDataSatuan()->result();
        $data['jenis_perbekalan'] = $this->master_model->getDataJenisPerbekalan()->result();
        $data['navbarTitle'] = $this->navbarTitle;
        $this->load->view('parts/header');
        $this->load->view('parts/sidebar',$data);
        $this->load->view('jenis_perbekalan',$data);
        $this->load->view('parts/footer');

    }

    public function addjenis(){

        $data['nmjenis'] = $this->input->post('nmjenis');
        $data['idsatuan'] = $this->input->post('idsatuan');
        $data['harga'] = $this->input->post('harga');
        $this->db->insert('jenis_perbekalan', $data);
        $this->session->set_flashdata("inserted","inserted");
        redirect('master/jenis_perbekalan');
    }

    public function updatejenis(){

        $idjenis = $this->input->post('idjenis');
        $nmjenis = $this->input->post('nmjenis');
        $idsatuan = $this->input->post('idsatuan');
        $harga = $this->input->post('harga');
        $this->db->set('nmjenis', $nmjenis);
        $this->db->set('idsatuan', $idsatuan);
        $this->db->set('harga', $harga);
        $this->db->where('idjenis', $idjenis);
        $this->db->update('jenis_perbekalan');
        $this->session->set_flashdata("updated","updated");
        redirect('master/jenis_perbekalan');
    }

    public function deletejenis($idjenis){

        $this->db->delete('jenis_perbekalan', array('idjenis' => $idjenis));
        $this->session->set_flashdata("deleted","deleted");
        redirect('master/jenis_perbekalan');
    }

    public function supplier(){
        $this->navbarTitle = "Supplier";
        $data['supplier'] = $this->master_model->getDataSupplier()->result();
        $data['navbarTitle'] = $this->navbarTitle;
        $this->load->view('parts/header');
        $this->load->view('parts/sidebar',$data);
        $this->load->view('supplier',$data);
        $this->load->view('parts/footer');

    }

    public function addsupplier(){

        $data['nmsupplier'] = $this->input->post('nmsupplier');
        $data['notelp'] = $this->input->post('notelp');
        $this->db->insert('supplier', $data);
        $this->session->set_flashdata("inserted","inserted");
        redirect('master/supplier');
    }

    public function updatesupplier(){

        $idsupplier = $this->input->post('idsupplier');
        $nmsupplier = $this->input->post('nmsupplier');
        $notelp = $this->input->post('notelp');
        $this->db->set('nmsupplier', $nmsupplier);
        $this->db->set('notelp', $notelp);
        $this->db->where('idsupplier', $idsupplier);
        $this->db->update('supplier');
        $this->session->set_flashdata("updated","updated");
        redirect('master/supplier');
    }

    public function deletesupplier($idsupplier){

        $this->db->delete('supplier', array('idsupplier' => $idsupplier));
        $this->session->set_flashdata("deleted","deleted");
        redirect('master/supplier');
    }
    
}