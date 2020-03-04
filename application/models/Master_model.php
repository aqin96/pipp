<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Gascoding
 * Date: 22/11/2018
 * Time: 13:51
 */
class master_model extends CI_Model 
{

    public function getDataUserByID($iduser){
        $q = $this->db->query("SELECT user.* FROM user where user.iduser = '$iduser'");
        return $q;
    }

    public function getDataKapal(){
        $q = $this->db->query("SELECT * FROM kapal ORDER BY idkapal DESC");
        return $q;
    }

    public function getDataPelabuhan(){
        $q = $this->db->query("SELECT * FROM pelabuhan ORDER BY idpelabuhan DESC");
        return $q;
    }

    public function getDataIkan(){
        $q = $this->db->query("SELECT * FROM ikan ORDER BY idikan DESC");
        return $q;
    }
    
    public function get10DataIkan(){
        $q = $this->db->query("SELECT * FROM ikan ORDER BY idikan DESC LIMIT 10");
        return $q;
    }

    public function getSingleIkan($idikan){
        $q = $this->db->query("SELECT * FROM ikan where idikan = '$idikan'");
        return $q;
    }

    public function getDataSatuan(){
        $q = $this->db->query("SELECT * FROM satuan ORDER BY idsatuan DESC");
        return $q;
    }

    public function getDataSupplier(){
        $q = $this->db->query("SELECT * FROM supplier ORDER BY idsupplier DESC");
        return $q;
    }

    public function getDataJenisPerbekalan(){
        $q = $this->db->query("SELECT jenis_perbekalan.*, satuan.satuan FROM jenis_perbekalan, satuan where jenis_perbekalan.idsatuan = satuan.idsatuan ORDER BY jenis_perbekalan.idjenis DESC");
        return $q;
    }

    public function getSingleJenis($idjenis){
        $q = $this->db->query("SELECT jenis_perbekalan.*, satuan.satuan FROM jenis_perbekalan,satuan where jenis_perbekalan.idsatuan = satuan.idsatuan and jenis_perbekalan.idjenis = '$idjenis'");
        return $q;
    }

    public function getDataBerita(){
        $q = $this->db->query("SELECT * FROM berita ORDER BY idberita DESC");
        return $q;
    }

    public function getSingleBerita($idberita){
        $q = $this->db->query("SELECT * FROM berita where idberita = '$idberita'");
        return $q;
    }

    public function getLaporanGroupIkan() {
        $q = $this->db->query("SELECT tangkapan.*, item_tangkap.*, ikan.nmikan, kapal.nmkapal FROM item_tangkap, ikan, tangkapan, kapal where tangkapan.idkapal = kapal.idkapal and tangkapan.idtangkapan = item_tangkap.idtangkapan and ikan.idikan = item_tangkap.idikan GROUP BY item_tangkap.idikan");
        return $q;
    }

    public function getDataBeritaPage($page, $batas){
        $posisi= ($page - 1) * $batas;
        $q = $this->db->query("SELECT * FROM berita ORDER BY waktu DESC LIMIT $posisi, $batas");
        return $q;
    }

    // laporan dashboard

    public function getHargaTangkap() {
        $q = $this->db->query("select sum(item_tangkap.harga) as harga_tangkap from item_tangkap, ikan, tangkapan, kapal where tangkapan.idkapal = kapal.idkapal and tangkapan.idtangkapan = item_tangkap.idtangkapan and ikan.idikan = item_tangkap.idikan GROUP BY item_tangkap.idikan");
        return $q;
    }

    public function getNamaIkanTangkap() {
        $q = $this->db->query("select ikan.nmikan from item_tangkap, ikan, tangkapan, kapal where tangkapan.idkapal = kapal.idkapal and tangkapan.idtangkapan = item_tangkap.idtangkapan and ikan.idikan = item_tangkap.idikan GROUP BY item_tangkap.idikan");
        return $q;
    }

}