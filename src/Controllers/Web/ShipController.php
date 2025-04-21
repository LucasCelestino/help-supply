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
        $lastSupplies = $ship->all(1000000,0);

        $itemsPerPage = 15;

        // Página atual (vinda da URL)
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $page = max($page, 1); // não deixa a página ser menor que 1

        // Calcula total de páginas
        $totalItems = count($lastSupplies);
        $totalPages = ceil($totalItems / $itemsPerPage);

        // Ajusta a página para não passar do total
        if ($page > $totalPages) {
            $page = $totalPages;
        }

        // Calcula o offset
        $offset = ($page - 1) * $itemsPerPage;

        $lastSuppliesOficial = $ship->all(15,$offset);

        $this->render('ship-supply', 'ship-supply.index', ['last_supplies'=>$lastSuppliesOficial,'page'=>$page,'totalPages'=>$totalPages]);
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

    public function search()
    {
        if(!isset($_GET['search']))
        {
            header("Location: ".APP_URL."/navios-fornecidos");
            die();
        }

        $search = $_GET['search'];

        $ship = $this->model('ShipModel');
        $lastSupplies = $ship->search($search);

        if(is_null($lastSupplies))
        {
            header("Location: ".APP_URL."/navios-fornecidos");
            die();
        }

        $itemsPerPage = 15;

        // Página atual (vinda da URL)
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $page = max($page, 1); // não deixa a página ser menor que 1

        // Calcula total de páginas
        $totalItems = count($lastSupplies);
        $totalPages = ceil($totalItems / $itemsPerPage);

        // Ajusta a página para não passar do total
        if ($page > $totalPages) {
            $page = $totalPages;
        }

        // Calcula o offset
        $offset = ($page - 1) * $itemsPerPage;

        $lastSuppliesOficial = $ship->all(15,$offset);

        $this->render('ship-supply', 'ship-supply.index', ['last_supplies'=>$lastSupplies]);
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

        $emptyField = false;

        if(isset($_GET['empty_field']) && $_GET['empty_field'] == true)
        {
            $emptyField = true;
        }

        $this->render('ship-supply', 'ship-supply-create', [
        'ship_type'=>$shipType,
        'ship_harbor'=>$shipHarbors,
        'ship_responsible'=>$shipResponsible,
        'ship_second_responsible'=>$shipSecondResponsible,
        'ship_regime'=>$shipRegime,
        'empty_field'=>$emptyField
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

        if((empty($shipName) || !isset($shipName)) || (empty($shipAcronym) || !isset($shipAcronym))
        || (empty($shipHarbor) || !isset($shipHarbor)) || (empty($shipType) || !isset($shipType))
        || (empty($supplyDate) || !isset($supplyDate)) || (empty($shipResponsible) || !isset($shipResponsible))
        || (empty($shipRegime) || !isset($shipRegime)) || (!isset($shipStatus))
        )
        {
            $script = "<script>
            window.location = '".APP_URL."/navios-fornecidos/adicionar?empty_field=true';</script>";
            echo $script;
            die();
        }

        if($shipSecondResponsible == "-")
        {
            $shipSecondResponsible = null;
        }

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

        $this->render('ship-supply', 'ship-supply.edit', [
        'ship'=>$shipLoaded,
        'ship_type'=>$shipType,
        'ship_harbor'=>$shipHarbors,
        'ship_responsible'=>$shipResponsible,
        'ship_second_responsible'=>$shipSecondResponsible,
        'ship_regime'=>$shipRegime,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(array $data)
    {
        $id = $_POST['ship-id'];
        $shipName = $_POST['ship-name'];
        $shipAcronym =  $_POST['ship-acronym'];
        $shipHarbor = $_POST['ship-harbor'];
        $shipType = $_POST['ship-type'];
        $supplyDate = $_POST['ship-supply'];
        $shipResponsible = $_POST['ship-responsible'];
        $shipSecondResponsible = $_POST['ship-second-responsible'];
        $shipRegime = $_POST['ship-regime'];
        $shipStatus = $_POST['ship-status'];

        $ship = $this->model('ShipModel');

        $shipLoaded = $ship->loadEdit($id);

        $shipLoaded->name = $shipName;
        $shipLoaded->acronym = $shipAcronym;
        $shipLoaded->harbor = $shipHarbor;
        $shipLoaded->type = $shipType;
        $shipLoaded->supply_date = $supplyDate;
        $shipLoaded->responsible = $shipResponsible;
        $shipLoaded->second_responsible = $shipSecondResponsible;
        $shipLoaded->regime = $shipRegime;
        $shipLoaded->status = $shipStatus;

        if($shipLoaded->save())
        {
            $script = "<script>
            window.location = '".APP_URL."/navios-fornecidos';</script>";
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