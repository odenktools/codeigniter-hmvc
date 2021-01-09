<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/TokenHandler.php';
require APPPATH . 'libraries/REST_Controller.php';

class Welcome extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index_get()
    {
        $data = array('message' => 'Hit welcome index');
        $this->set_response($data, REST_Controller::HTTP_OK);
    }
}
