<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Gascoding
 * Date: 06/12/2018
 * Time: 10:58
 */
class notfound extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->navbarTitle = "404";
        $data['navbarTitle'] = $this->navbarTitle;
        $this->load->view('404');
    }
    
}