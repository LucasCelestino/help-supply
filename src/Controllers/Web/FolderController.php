<?php

namespace App\Controllers\Web;

class FolderController extends Controller
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
        $folder = $this->model('FolderModel');

        $allFolders = $folder->all(1000000,0);

        $itemsPerPage = 15;

        $allFolders = $allFolders == null ? [] : $allFolders;

        // Página atual (vinda da URL)
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $page = max($page, 1); // não deixa a página ser menor que 1

        // Calcula total de páginas
        $totalItems = count($allFolders);
        $totalPages = ceil($totalItems / $itemsPerPage);

        // Ajusta a página para não passar do total
        if ($page > $totalPages) {
            $page = $totalPages;
        }

        // Calcula o offset
        $offset = ($page - 1) * $itemsPerPage;

        $allFoldersOficial = $folder->all(15,$offset);

        $this->render('folders', 'folders.index', ['all_folders'=>$allFoldersOficial,'page'=>$page,'totalPages'=>$totalPages]);
    }

    /**
     * Display the specified resource.
     *
     * @param array $data
     */
    public function show(array $data)
    {
        $folder = $this->model('FolderModel');

        $id = $data['id'];

        $folderLoaded = $folder->load($id);

        $this->render('folders', 'folders.show', ['folder'=>$folderLoaded]);
    }

    public function search()
    {
        if(!isset($_GET['search']))
        {
            header("Location: ".APP_URL."/navios-fornecidos");
            die();
        }

        $search = $_GET['search'];

        $folder = $this->model('FolderModel');
        $searchedFolders = $folder->search($search);

        if(is_null($searchedFolders))
        {
            header("Location: ".APP_URL."/controle-pastas");
            die();
        }

        $itemsPerPage = 15;

        // Página atual (vinda da URL)
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $page = max($page, 1); // não deixa a página ser menor que 1

        // Calcula total de páginas
        $totalItems = count($searchedFolders);
        $totalPages = ceil($totalItems / $itemsPerPage);

        // Ajusta a página para não passar do total
        if ($page > $totalPages) {
            $page = $totalPages;
        }

        // Calcula o offset
        $offset = ($page - 1) * $itemsPerPage;

        $searchedFoldersOficial = $folder->all(15,$offset);

        $this->render('folders', 'folders.index', ['all_folders'=>$searchedFolders]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = $this->model('CustomerModel');
        $folderStatus = $this->model('FolderStatusModel');

        $folderCustomers = $customers->all(500);
        $folderStatus = $folderStatus->all(100);

        $emptyField = false;

        if(isset($_GET['empty_field']) && $_GET['empty_field'] == true)
        {
            $emptyField = true;
        }

        $this->render('folders', 'folders.create', ['customers'=>$folderCustomers,'folder_status'=>$folderStatus,'empty_field'=>$emptyField]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $invoiceNumber = $_POST['invoice_number'];
        $shipName =  $_POST['ship_name'];
        $shipAcronym = $_POST['acronym'];
        $customer = $_POST['customer'];
        $supplyDate = $_POST['supply_date'];
        $receiptDate = $_POST['receipt_date'];
        $folderStatus = $_POST['folder_status'];
        $pendingReason = $_POST['pending_reason'];
        $folderReponsible = $_POST['folder_responsible'];

        if((empty($invoiceNumber) || !isset($invoiceNumber)) || (empty($shipName) || !isset($shipName))
        || (empty($shipAcronym) || !isset($shipAcronym)) || (empty($customer) || !isset($customer))
        || (empty($supplyDate) || !isset($supplyDate)) || (empty($receiptDate) || !isset($receiptDate))
        || (empty($folderStatus) || !isset($folderStatus)))
        {
            $script = "<script>
            window.location = '".APP_URL."/controle-pastas/adicionar?empty_field=true';</script>";
            echo $script;
            die();
        }

        $folder = $this->model('FolderModel');

        $newFolder = $folder->bootstrap($invoiceNumber, $shipName, $shipAcronym, 
        $customer, $supplyDate, $receiptDate, $folderStatus,
        $pendingReason, $folderReponsible);

        if($newFolder->save())
        {
            $script = "<script>
            window.location = '".APP_URL."/controle-pastas';</script>";
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
        $folder = $this->model('FolderModel');

        $id = $data['id'];

        $folderLoaded = $folder->load($id);

        $customers = $this->model('CustomerModel');
        $folderStatus = $this->model('FolderStatusModel');

        $folderCustomers = $customers->all(500);
        $folderStatus = $folderStatus->all(100);

        $this->render('folders', 'folders.edit', [
        'folder'=>$folderLoaded,
        'customers'=>$folderCustomers,
        'folder_status'=>$folderStatus,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(array $data)
    {

        $id = $_POST['folder_id'];
        $invoiceNumber = $_POST['invoice_number'];
        $shipName =  $_POST['ship_name'];
        $shipAcronym = $_POST['acronym'];
        $customer = $_POST['customer'];
        $supplyDate = $_POST['supply_date'];
        $receiptDate = $_POST['receipt_date'];
        $folderStatus = $_POST['folder_status'];
        $pendingReason = $_POST['pending_reason'];
        $folderReponsible = $_POST['folder_responsible'];

        $folder = $this->model('FolderModel');

        $folderLoaded = $folder->loadEdit($id);

        $folderLoaded->invoice_number = $invoiceNumber;
        $folderLoaded->ship_name = $shipName;
        $folderLoaded->ship_acronym = $shipAcronym;
        $folderLoaded->customer = $customer;
        $folderLoaded->supply_date = $supplyDate;
        $folderLoaded->receipt_date = $receiptDate;
        $folderLoaded->status = $folderStatus;
        $folderLoaded->pending_reason = $pendingReason;
        $folderLoaded->folder_responsible = $folderReponsible;

        if($folderLoaded->save())
        {
            $script = "<script>
            window.location = '".APP_URL."/controle-pastas';</script>";
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
        $folder = $this->model('FolderModel');

        $id = $data['id'];

        $folderLoaded = $folder->load($id);

        $folderLoaded->destroy();

        $script = "<script>
        window.location = '".APP_URL."/controle-pastas';</script>";
        echo $script;
        die();
    }
}