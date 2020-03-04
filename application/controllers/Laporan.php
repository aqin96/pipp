<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Gascoding
 * Date: 06/12/2018
 * Time: 10:58
 */
class laporan extends CI_Controller
{
    var $userSession;
    var $kapal = "kapal"; 
    var $pelabuhan = "pelabuhan"; 
    var $ikan = "ikan"; 
    var $jenis_perbekalan = "jenis_perbekalan"; 
    var $gallerypath;

    function __construct()
    {
        parent::__construct();

        $iduser = $this->session->userdata('iduser');
        $this->load->model('master_model');
        $this->load->model('transaksi_model');

        if ($iduser != "") {

            $this->load->model('master_model');
            $this->load->model('transaksi_model');
            $this->navbar_Title = "Laporan";

        } else {
            redirect('auth');
        }
    }

    public function index(){
        $this->navbarTitle = "404";
        $data['navbarTitle'] = $this->navbarTitle;
        $this->load->view('404');
    }

    public function produksi_harga(){
        $this->navbarTitle = "Produksi Harga";
        $data['kapal'] = $this->master_model->getDataKapal()->result();
        $data['pelabuhan'] = $this->master_model->getDataPelabuhan()->result();
        $data['tangkapan'] = $this->transaksi_model->getDataTangkapan()->result();
        $data['navbarTitle'] = $this->navbarTitle;
        $this->load->view('parts/header');
        $this->load->view('parts/sidebar',$data);
        $this->load->view('laporan_produksi_harga',$data);
        $this->load->view('parts/footer');

    }

    function filterLaporan($range){
        $this->navbarTitle = "Produksi Harga";

        $data['tangkapan'] = $this->transaksi_model->getDataFilterTangkapan($range)->result();
        $data['navbarTitle'] = $this->navbarTitle;
        $this->load->view('parts/header');
        $this->load->view('parts/sidebar',$data);
        $this->load->view('laporan_produksi_harga',$data);
        $this->load->view('parts/footer');
    }

    function cetaklaporan($range){ 
    $data['tangkapan'] = $this->transaksi_model->getDataFilterTangkapan($range)->result();

    if ($data['tangkapan'] == null) {
        # code...
        redirect('notFound');
    }

    else {
        $this->load->view('cetaklaporan',$data);
     }
    }
    
    function cetak_laporan(){ 
    $data['tangkapan'] = $this->transaksi_model->getDataTangkapan()->result();

    if ($data['tangkapan'] == null) {
        # code...
        redirect('notFound');
    }

    else {
        $this->load->view('cetaklaporan',$data);
     }
    }

    public function addtangkapan(){

        $data['idkapal'] = $this->input->post('idkapal');
        $data['idpelabuhan'] = $this->input->post('idpelabuhan');
        $data['waktu'] = $this->input->post('waktu');
        $this->db->insert('tangkapan', $data);
        $this->session->set_flashdata("inserted","inserted");
        redirect('entry/produksi_harga');
    }

    public function updatetangkapan(){

        $idtangkapan = $this->input->post('idtangkapan');
        $idkapal = $this->input->post('idkapal');
        $idpelabuhan = $this->input->post('idpelabuhan');
        $waktu = $this->input->post('waktu');
        $this->db->set('idkapal', $idkapal);
        $this->db->set('idpelabuhan', $idpelabuhan);
        $this->db->set('waktu', $waktu);
        $this->db->where('idtangkapan', $idtangkapan);
        $this->db->update('tangkapan');
        $this->session->set_flashdata("updated","updated");
        redirect('entry/produksi_harga');
    }

    public function deletetangkapan($idtangkapan){

        $this->db->delete('tangkapan', array('idtangkapan' => $idtangkapan));
        $this->session->set_flashdata("deleted","deleted");
        redirect('entry/produksi_harga');
    }

    public function item_tangkap($idtangkapan){
        $this->navbarTitle = "Produksi Harga";
        $data['ikan'] = $this->master_model->getDataIkan()->result();
        $data['tangkapan'] = $this->transaksi_model->getSingleTangkapan($idtangkapan)->result();
        $data['detail'] = $this->transaksi_model->getItemTangkap($idtangkapan)->result();
        $data['navbarTitle'] = $this->navbarTitle;
        $this->load->view('parts/header');
        $this->load->view('parts/sidebar',$data);
        $this->load->view('item_tangkap',$data);
        $this->load->view('parts/footer');
    }

    public function getHargaIkan($idikan){
        $harga_ikan = $this->master_model->getSingleIkan($idikan)->row()->harga;
        echo json_encode($harga_ikan);
    }

    public function getHargaJenis($idjenis){
        $harga_jenis = $this->master_model->getSingleJenis($idjenis)->row()->harga;
        $satuan = $this->master_model->getSingleJenis($idjenis)->row()->satuan;
        echo json_encode(array("harga"=>$harga_jenis,"satuan"=>$satuan));
    }

    public function additem(){
        $idtangkapan = $this->input->post('idtangkapan');
        $data['idtangkapan'] = $this->input->post('idtangkapan');
        $data['idikan'] = $this->input->post('idikan');
        $data['qty'] = $this->input->post('qty');
        $data['harga'] = $this->input->post('hargasatuan');
        $this->db->insert('item_tangkap', $data);
        $this->session->set_flashdata("inserted","inserted");
        redirect('entry/item_tangkap/'.$idtangkapan);
    }

    public function updateitem(){
        $idtangkapan = $this->input->post('idtangkapan');
        $iditem = $this->input->post('iditem');
        $idikan = $this->input->post('idikan');
        $qty = $this->input->post('qty');
        $harga = $this->input->post('hargasatuan');
        $this->db->set('idikan', $idikan);
        $this->db->set('qty', $qty);
        $this->db->set('harga', $harga);
        $this->db->where('iditem', $iditem);
        $this->db->update('item_tangkap');
        $this->session->set_flashdata("updated","updated");
        redirect('entry/item_tangkap/'.$idtangkapan);
    }

    public function deleteitem($iditem, $idtangkapan){

        $this->db->delete('item_tangkap', array('iditem' => $iditem));
        $this->session->set_flashdata("deleted","deleted");
        redirect('entry/item_tangkap/'.$idtangkapan);
    }

    public function perbekalan(){
        $this->navbarTitle = "Perbekalan";
        $data['jenis'] = $this->master_model->getDataJenisPerbekalan()->result();
        $data['supplier'] = $this->master_model->getDataSupplier()->result();
        $data['perbekalan'] = $this->transaksi_model->getDataPerbekalan()->result();
        $data['navbarTitle'] = $this->navbarTitle;
        $this->load->view('parts/header');
        $this->load->view('parts/sidebar',$data);
        $this->load->view('perbekalan',$data);
        $this->load->view('parts/footer');

    }

    public function addperbekalan(){
        $data['idjenis'] = $this->input->post('idjenis');
        $data['idsupplier'] = $this->input->post('idsupplier');
        $data['volume'] = $this->input->post('volume');
        $data['harga'] = $this->input->post('hargasatuan');
        $this->db->insert('perbekalan', $data);
        $this->session->set_flashdata("inserted","inserted");
        redirect('entry/perbekalan/');
    }

    public function updateperbekalan(){
        $idperbekalan = $this->input->post('idperbekalan');
        $idjenis = $this->input->post('idjenis');
        $idsupplier = $this->input->post('idsupplier');
        $volume = $this->input->post('volume');
        $harga = $this->input->post('hargasatuan');
        $this->db->set('idjenis', $idjenis);
        $this->db->set('idsupplier', $idsupplier);
        $this->db->set('volume', $volume);
        $this->db->set('harga', $harga);
        $this->db->where('idperbekalan', $idperbekalan);
        $this->db->update('perbekalan');
        $this->session->set_flashdata("updated","updated");
        redirect('entry/perbekalan');
    }

    public function deleteperbekalan($idperbekalan){

        $this->db->delete('perbekalan', array('idperbekalan' => $idperbekalan));
        $this->session->set_flashdata("deleted","deleted");
        redirect('entry/perbekalan/');
    }

    public function berita(){
        $this->navbarTitle = "Berita";
        $data['berita'] = $this->master_model->getDataBerita()->result();
        $data['navbarTitle'] = $this->navbarTitle;
        $this->load->view('parts/header');
        $this->load->view('parts/sidebar',$data);
        $this->load->view('berita',$data);
        $this->load->view('parts/footer');

    }

    public function addberita(){
        $judul = $this->input->post('judul');
        $isi = $this->input->post('isi');

        // Persyaratan Random
        $now = date('Y-m-d H:i:s');
        $y = date('y', strtotime($now));
        $m = date('m', strtotime($now));
        $d = date('d', strtotime($now));
        $his = date('hJiqs', strtotime($now));
        $addrand = $y.$m.$d.$his; 

        function generateRandomString($length = 10) { //generate rancode 
        $characters = '0123456789poiuytrewqasdfghjklmnbvcxzQWERTYUIOPLKJHGFDSAZXCVBNM';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
          $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
        }
        $random = generateRandomString().$addrand;

        // Gambar
        $featuredimage = $_FILES['featuredimage']['tmp_name'];
        $featuredimage_name = strtolower($_FILES['featuredimage']['name']);
        $ext_featuredimage = substr($featuredimage_name, strrpos($featuredimage_name, '.')); 
        $nFn_featuredimage = $random.$ext_featuredimage;
        
        // tentukan lokasi upload gambar
        $dir = "assets/img/berita/";
        
        // Upload File Gambar
        $uploadfeaturedimage = move_uploaded_file($featuredimage, $dir.$nFn_featuredimage);
        // End Upload Gambar

        $featured = 'http://localhost/pipp/assets/img/berita/'.$nFn_featuredimage;

        $this->db->query("INSERT INTO berita (judul, featuredimage, isi) VALUES ('$judul','$featured','$isi')");
        $this->session->set_flashdata("inserted","inserted");
        redirect('entry/berita');
    }

    public function updateberita(){
        $idberita = $this->input->post('idberita');
        $judul = $this->input->post('judul');
        $isi = $this->input->post('isi');

        if($_FILES['featuredimage']['name'] != '') {
            // Persyaratan Random
            $now = date('Y-m-d H:i:s');
            $y = date('y', strtotime($now));
            $m = date('m', strtotime($now));
            $d = date('d', strtotime($now));
            $his = date('hJiqs', strtotime($now));
            $addrand = $y.$m.$d.$his; 

            function generateRandomString($length = 10) { //generate rancode 
            $characters = '0123456789poiuytrewqasdfghjklmnbvcxzQWERTYUIOPLKJHGFDSAZXCVBNM';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
              $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
            }
            $random = generateRandomString().$addrand;

            // Gambar
            $featuredimage = $_FILES['featuredimage']['tmp_name'];
            $featuredimage_name = strtolower($_FILES['featuredimage']['name']);
            $ext_featuredimage = substr($featuredimage_name, strrpos($featuredimage_name, '.')); 
            $nFn_featuredimage = $random.$ext_featuredimage;
            
            // tentukan lokasi upload gambar
            $dir = "assets/img/berita/";
            
            // Upload File Gambar
            $uploadfeaturedimage = move_uploaded_file($featuredimage, $dir.$nFn_featuredimage);
            // End Upload Gambar

            $featured = 'http://localhost/pipp/assets/img/berita/'.$nFn_featuredimage;

            $this->db->set('judul', $judul);
            $this->db->set('isi', $isi);
            $this->db->set('featuredimage', $featured);
            $this->db->where('idberita', $idberita);
            $this->db->update('berita');
        }
        else {
            $this->db->set('judul', $judul);
            $this->db->set('isi', $isi);
            $this->db->where('idberita', $idberita);
            $this->db->update('berita');
        }
        $this->session->set_flashdata("updated","updated");
        redirect('entry/berita');
    }

    public function deleteberita($idberita){

        $this->db->delete('berita', array('idberita' => $idberita));
        $this->session->set_flashdata("deleted","deleted");
        redirect('entry/berita');
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