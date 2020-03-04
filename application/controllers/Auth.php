<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Gascoding
 * Date: 22/11/2018
 * Time: 13:51
 */
class auth extends CI_Controller
{
    var $gallerypath;
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->library(array('form_validation','pagination','session'));
        $this->load->model('otentikasi_model');
    }

    function index(){
       $this->load->view('login');
    }

    function dashboard(){

        $this->load->view('parts/header');
        $this->load->view('parts/sidebar');
        $this->load->view('dashboard',$data);
        $this->load->view('parts/footer');
    }

    function signInUser(){
        $in['username'] = $this->input->post('username');
        $in['password'] = $this->input->post('password');
        $this->otentikasi_model->cekLoginUser($in);
    }

    function logout(){
        session_destroy();
        redirect(base_url());
    }
  
}