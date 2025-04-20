<?php

namespace App\Controllers\Web;

class ShipController extends Controller
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
        $ship = $this->model('ShipModel');

        $lastSupplies = $ship->all(15,0);

        $this->render('ship-supply', 'ship-supply.index', ['last_supplies'=>$lastSupplies]);
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