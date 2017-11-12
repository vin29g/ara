<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tpsl extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index() {
        $this->load->view('tpsl/Request.php');
    }

    public function success() {
        echo "success" ;
    }

    public function failure() {
        echo "failure" ;
    }

}