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
        $ship = $this->model('ShipModel');

        $id = $data['id'];

        $shipLoaded = $ship->load($id);

        $this->render('ship-supply', 'ship-supply.show', ['ship'=>$shipLoaded]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type = $this->model('ShipTypeModel');
        $harbor = $this->model('ShipHarbor');
        $responsible = $this->model('ShipResponsibleModel');
        $secondResponsible = $this->model('ShipSecondResponsibleModel');
        $regime = $this->model('ShipRegimeModel');

        $shipType = $type->all(100);
        $shipHarbors = $harbor->all(100);
        $shipResponsible = $responsible->all();
        $shipSecondResponsible = $secondResponsible->all();
        $shipRegime = $regime->all();

        $this->render('ship-supply', 'ship-supply-create', [
        'ship_type'=>$shipType,
        'ship_harbor'=>$shipHarbors,
        'ship_responsible'=>$shipResponsible,
        'ship_second_responsible'=>$shipSecondResponsible,
        'ship_regime'=>$shipRegime,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $shipName = $_POST['ship-name'];
        $shipAcronym =  $_POST['ship-acronym'];
        $shipHarbor = $_POST['ship-harbor'];
        $shipType = $_POST['ship-type'];
        $supplyDate = $_POST['supply-date'];
        $shipResponsible = $_POST['ship-responsible'];
        $shipSecondResponsible = $_POST['ship-second-responsible'];
        $shipRegime = $_POST['ship-regime'];
        $shipStatus = $_POST['ship-status'];

        $ship = $this->model('ShipModel');

        $newShip = $ship->bootstrap($shipName, $shipAcronym, $shipHarbor, 
        $shipType, $supplyDate, $shipResponsible, $shipSecondResponsible,
        $shipRegime, $shipStatus);

        if($newShip->save())
        {
            $script = "<script>
            window.location = '".APP_URL."/navios-fornecidos';</script>";
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
        $ship = $this->model('ShipModel');

        $id = $data['id'];

        $shipLoaded = $ship->load($id);

        $this->render('ship-supply', 'ship-supply.edit', ['ship'=>$shipLoaded]);
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
        $ship = $this->model('ShipModel');

        $id = $data['id'];

        $shipLoaded = $ship->load($id);

        $shipLoaded->destroy();

        $script = "<script>
        window.location = '".APP_URL."/navios-fornecidos';</script>";
        echo $script;
        die();
    }
}