<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Hello extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User');
    }

    public function index()
    {
        $this->load->view('hello_message');
    }

    public function create_data()
    {
        User::create(array(
            'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            'username' => 'odenktools',
            'email' => 'odenktools@gmail.com',
            'password' => $this->hash_password('12345678'),
            'role_slug' => 'owner',
            'created_at' => \Carbon\Carbon::now(),
        ));
    }

    public function login()
    {
        $user = User::query()
            ->where(array('username' => 'odenktools'))
            ->where(array('email' => 'odenktools@gmail.com'))
            ->first();
        if($user){
            $pass_user = '12345678';
            if (password_verify($pass_user, $user->password)) {
                echo "Login success";
            } else {
                echo "Wrong Password. Try again.";
            }
        }
    }

    public function list_data()
    {
        $conditions = '1 = 1';
        $select = User::query()
            ->select(array(
                'users.*',
            ))
            ->whereRaw($conditions);
        $paginate = $select->paginate(20);
        echo json_encode($paginate->toArray());
    }

    private function hash_password($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }
}
