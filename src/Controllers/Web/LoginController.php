<?php

namespace App\Controllers\Web;

use App\Models\UserModel;

class LoginController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(isset($_SESSION['user_auth']) || !empty($_SESSION['user_auth']))
        {
            header("Location: home");
            die();
        }

        $this->render('login', 'login.index', []);
    }

    public function login()
    {
        if(isset($_POST['action']))
        {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if((!isset($username) || empty($username)) || (!isset($password) || empty($password)))
            {
                $script = "<script>
                window.location = '".APP_URL."/login?empty_field=true';</script>";
                echo $script;
                die();
            }

            $user = $this->model('UserModel');

            $findedUser = $user->find($username);

            if(password_verify($password, $findedUser->password))
            {
                $session = $this->session();

                $session->set("user_auth", ['user_id'=>$findedUser->id,'user_name'=>$findedUser->name, 'user_password'=>$findedUser->password]);

                header("Location: home");

                die();
            }
            else
            {
                $script = "<script>
                window.location = '".APP_URL."/login?incorret_password=true';</script>";
                echo $script;
                die();
            }
        }
    }

    public function loggout()
    {
        if(isset($_SESSION['user_auth']) && !empty($_SESSION['user_auth']))
        {
            $session = $this->session();

            $session->unset("user_auth");

            header("Location: home");

            die();
        }

        $this->render('login', 'login.index', []);
    }


    /**
     * Display the specified resource.
     *
     * @param array $data
     */
    public function show(array $data)
    {
        // $user = $this->model('UserModel');

        // $id = $data['id'];

        // $userLoad = $user->load($id);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->render('users', 'users.create', ['name'=>'Dev']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        // store
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param array $data
     */
    public function edit(array $data)
    {
        $this->render('users', 'users.edit', ['name'=>'Dev']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        // update
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param array $data
     */
    public function destroy(array $data)
    {
        // destroy
    }
}