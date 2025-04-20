<?php

namespace App\Controllers\Web;

use App\Models\UserModel;
use App\Models\FolderModel;

class HomeController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!isset($_SESSION['user_auth']) || empty($_SESSION['user_auth']))
        {
            header("Location: login");
            die();
        }

        $folder = $this->model('FolderModel');

        $racineFolders = $folder->findByStatus(3) != null ? count($folder->findByStatus(3)) : 0;
        $sendFolders = $folder->findByStatus(6) != null ? count($folder->findByStatus(6)) : 0;
        $foldersWithPendings = $folder->findByStatus(5) != null ? count($folder->findByStatus(5)) : 0;

        $ship = $this->model('ShipModel');

        $lastSupplies = $ship->all(10,0,'id,name,acronym,harbor,type,supply_date,status');

        $reminders = $this->model('RemindersModel');

        $lastReminders = $reminders->all(1);

        $this->render('home', 'home.index', [
        'folders_with_racine'=>$racineFolders,
        'folders_send'=>$sendFolders,
        'folders_with_pendings'=>$foldersWithPendings,
        'last_supplies'=>$lastSupplies,
        'last_reminders'=>$lastReminders
        ]);
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