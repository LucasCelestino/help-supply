<?php

namespace App\Controllers\Web;

class ProfileController extends Controller
{
    public function __construct()
    {
        if(!isset($_SESSION['user_auth']) || empty($_SESSION['user_auth']))
        {
            header("Location: login");
            die();
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $incorrectField = false;
        $emptyField = false;

        if(isset($_GET['incorrect_field']) && $_GET['incorrect_field'] == true)
        {
            $incorrectField = true;
        }

        if(isset($_GET['empty_field']) && $_GET['empty_field'] == true)
        {
            $emptyField = true;
        }

        $session = $this->session();

        $user_id = $session->all()->user_auth->user_id;

        $user = $this->model('UserModel');

        $userLoaded = $user->load($user_id);

        $this->render('users', 'users.profile.index', ['user'=>$userLoaded, 'incorrect_field'=>$incorrectField, 'empty_field'=>$emptyField]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        $user_id = $_POST['user_id'];
        $name = $_POST['user_name'];
        $login = $_POST['user_login'];
        $password = $_POST['user_new_password'];
        $confirmedPassword = $_POST['user_new_password_confirmed'];

        if($name == "" || $login == "" || $password == "")
        {
            $script = "<script>
            window.location = '".APP_URL."/perfil?empty_field=true';</script>";
            echo $script;
            die();
        }

        if($password != $confirmedPassword)
        {
            $script = "<script>
            window.location = '".APP_URL."/perfil?incorrect_field=true';</script>";
            echo $script;
            die();
        }

        $session = $this->session();

        $user = $this->model('UserModel');

        $userLoaded = $user->load($user_id);

        $userLoaded->name = $name;
        $userLoaded->login = $login;
        $userLoaded->password = password_hash($password, PASSWORD_BCRYPT);

        if($userLoaded->save())
        {
            $session->set("user_auth", ['user_id'=>$user_id,'user_name'=>$name, 'user_password'=>password_hash($password, PASSWORD_BCRYPT)]);
            $script = "<script>
            window.location = '".APP_URL."/perfil?success=true';</script>";
            echo $script;
            die();
        }

    }
}