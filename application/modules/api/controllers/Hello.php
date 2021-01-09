<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/TokenHandler.php';
require APPPATH . 'libraries/REST_Controller.php';

class Hello extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User');
    }

    public function createdata_post()
    {
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $data = User::create(array(
            'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            'username' => $username,
            'email' => $email,
            'password' => $this->hash_password($password),
            'role_slug' => 'owner',
            'created_at' => \Carbon\Carbon::now(),
        ));

        $this->set_response($data, REST_Controller::HTTP_OK);
    }


    public function login_post()
    {
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = User::query()
            ->where(array('username' => $username))
            ->where(array('email' => $email))
            ->first();
        if ($user) {
            if (password_verify($password, $user->password)) {
                $data = array('message' => 'oke');
                $this->set_response($data, REST_Controller::HTTP_OK);
            } else {
                $data = array('message' => 'Invalid');
                $this->set_response($data, 401);
            }
        }
    }

    public function list_get()
    {
        $conditions = '1 = 1';
        $select = User::query()
            ->select(array(
                'users.*',
            ))
            ->whereRaw($conditions);
        $paginate = $select->paginate(20);
        $this->set_response($paginate, REST_Controller::HTTP_OK);
    }

    private function hash_password($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }
}
