<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Gascoding
 * Date: 22/11/2018
 * Time: 13:51
 */
class transaksi_model extends CI_Model 
{


    public function getDataTangkapan(){
        $q = $this->db->query("SELECT tangkapan.*, kapal.nmkapal, pelabuhan.nmpelabuhan FROM tangkapan, kapal, pelabuhan where tangkapan.idkapal = kapal.idkapal AND tangkapan.idpelabuhan = pelabuhan.idpelabuhan ORDER BY tangkapan.idtangkapan DESC");
        return $q;
    }

    public function getSingleTangkapan($idtangkapan){
        $q = $this->db->query("SELECT tangkapan.*, kapal.nmkapal, pelabuhan.nmpelabuhan FROM tangkapan, kapal, pelabuhan where tangkapan.idkapal = kapal.idkapal AND tangkapan.idpelabuhan = pelabuhan.idpelabuhan and tangkapan.idtangkapan = '$idtangkapan'");
        return $q;
    }

    public function getItemTangkap($idtangkapan){
        $q = $this->db->query("SELECT item_tangkap.*, kapal.nmkapal, pelabuhan.nmpelabuhan, tangkapan.waktu, ikan.nmikan from item_tangkap, tangkapan, kapal, pelabuhan, ikan where item_tangkap.idtangkapan = tangkapan.idtangkapan and tangkapan.idkapal = kapal.idkapal and tangkapan.idpelabuhan = pelabuhan.idpelabuhan and item_tangkap.idikan = ikan.idikan and item_tangkap.idtangkapan = '$idtangkapan' ORDER BY item_tangkap.iditem DESC");
        return $q;
    }

    public function getDataPerbekalan(){
        $q = $this->db->query("SELECT perbekalan.*, supplier.nmsupplier, jenis_perbekalan.nmjenis FROM perbekalan, supplier, jenis_perbekalan where perbekalan.idjenis = jenis_perbekalan.idjenis AND perbekalan.idsupplier = supplier.idsupplier ORDER BY perbekalan.idperbekalan DESC");
        return $q;
    }

    public function getDataFilterTangkapan($range){
        $array = explode (":", $range);  
        $tglawal = date('Y-m-d', strtotime($array[0])); 
        $tglakhir = date('Y-m-d', strtotime($array[1])); 
        $q = $this->db->query("SELECT tangkapan.*, kapal.nmkapal, pelabuhan.nmpelabuhan FROM tangkapan, kapal, pelabuhan where tangkapan.idkapal = kapal.idkapal AND tangkapan.idpelabuhan = pelabuhan.idpelabuhan and DATE(tangkapan.waktu) >= '$tglawal' and DATE(tangkapan.waktu) <= '$tglakhir' ORDER BY tangkapan.idtangkapan DESC");
        return $q;
    }

}