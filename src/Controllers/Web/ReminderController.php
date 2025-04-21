<?php

namespace App\Controllers\Web;

class ReminderController extends Controller
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
        $reminder = $this->model('RemindersModel');

        $session = $this->session();

        $user = $session->all()->user_auth->user_id;

        $allReminders = $reminder->all($user,100000);

        $itemsPerPage = 15;

        $allReminders = $allReminders == null ? [] : $allReminders;

        // Página atual (vinda da URL)
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $page = max($page, 1); // não deixa a página ser menor que 1

        // Calcula total de páginas
        $totalItems = count($allReminders);
        $totalPages = ceil($totalItems / $itemsPerPage);

        // Ajusta a página para não passar do total
        if ($page > $totalPages) {
            $page = $totalPages;
        }

        // Calcula o offset
        $offset = ($page - 1) * $itemsPerPage;

        $allRemindersOficial = $reminder->all($user);

        $this->render('reminders', 'reminders.index', ['reminders'=>$allRemindersOficial,'page'=>$page,'totalPages'=>$totalPages]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $emptyField = false;

        if(isset($_GET['empty_field']) && $_GET['empty_field'] == true)
        {
            $emptyField = true;
        }

        $this->render('reminders', 'reminders.create', ['empty_field'=>$emptyField]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $reminderPost = $_POST['reminder'];

        if((empty($reminderPost) || !isset($reminderPost)))
        {
            $script = "<script>
            window.location = '".APP_URL."/lembretes/adicionar?empty_field=true';</script>";
            echo $script;
            die();
        }

        $reminder = $this->model('RemindersModel');

        $session = $this->session();

        $user = $session->all()->user_auth->user_id;

        $newReminder = $reminder->bootstrap($reminderPost, $user);

        if($newReminder->save())
        {
            $script = "<script>
            window.location = '".APP_URL."/lembretes';</script>";
            echo $script;
            die();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param array $data
     */
    public function edit(array $data)
    {
        $reminder = $this->model('RemindersModel');

        $id = $data['id'];

        $session = $this->session();

        $user = $session->all()->user_auth->user_id;

        $reminderLoaded = $reminder->load($id, $user);

        $emptyField = false;

        if(isset($_GET['empty_field']) && $_GET['empty_field'] == true)
        {
            $emptyField = true;
        }

        $this->render('reminders', 'reminders.edit', ['reminder'=>$reminderLoaded,'empty_field'=>$emptyField]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(array $data)
    {

        $id = $_POST['reminder_id'];
        $reminderPost = $_POST['reminder'];

        $reminder = $this->model('RemindersModel');

        $session = $this->session();

        $user = $session->all()->user_auth->user_id;

        $reminderLoaded = $reminder->load($id, $user);

        $reminderLoaded->reminder = $reminderPost;

        if($reminderLoaded->save())
        {
            $script = "<script>
            window.location = '".APP_URL."/lembretes';</script>";
            echo $script;
            die();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param array $data
     */
    public function destroy(array $data)
    {
        $reminder = $this->model('RemindersModel');

        $id = $data['id'];

        $session = $this->session();

        $user = $session->all()->user_auth->user_id;

        $reminderLoaded = $reminder->load($id, $user);

        $reminderLoaded->destroy();

        $script = "<script>
        window.location = '".APP_URL."/lembretes';</script>";
        echo $script;
        die();
    }
}