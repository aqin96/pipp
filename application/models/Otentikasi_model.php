<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Gascoding
 * Date: 22/11/2018
 * Time: 13:51
 */
class otentikasi_model extends CI_Model 
{
    var $user    = "user";

    function get_user(){
        $data = $this->db->get($this->user);
        return $data;
    }

    public function cekLoginUser($data){

        $username = $data['username'];
        $password = md5($data['password']);

        $cek = $this->db->get_where($this->user,array('username'=>$username))->num_rows();
        $result = $this->db->get_where($this->user,array('username'=>$username))->result();

        if ($cek != 0){

            // $pass_didb = $this->encryption->decrypt($result[0]->password);
            $pass_didb = $result[0]->password;
            $publish = $result[0]->publish;

            if ($publish == "F"){
                $this->session->set_flashdata("error_status","Login Gagal, cek kembali Username dan password anda");
                redirect('ssh2_auth_password(session, username, password)');
            } else {
                if ($pass_didb == $password){

                        $hakAkses = $result[0]->iduser;

                        $session['iduser'] = $result[0]->iduser;
                        $session['nmuser'] = $result[0]->nmuser;
                        $session['username'] = $result[0]->username;
                        $session['level'] = $result[0]->level;

                        $this->session->set_userdata($session);

                        redirect('dashboard');

                } else{

                    $this->session->set_flashdata("error","Login Gagal, cek kembali Username dan password anda");
                    redirect('Auth');
                }
            }

        } else{
            $this->session->set_flashdata("error","Login Gagal, cek kembali Username dan password anda");
            redirect('Auth');
        }
    }

}