<?php

namespace App\Models;

class FolderModel extends Model
{
    /**
     * @var array
     */
    protected static array $safe = ['id', 'created_at', 'updated_at'];

    /**
     * @var string
     */
    private static string $entity = 'folders';

    /**
     * @param String $invoice_number
     * @param String $ship_name
     * @param String $ship_acronym
     * @param Integer $customer
     * @param String $supply_date
     * @param String $receipt_date
     * @param Integer $status
     * @param Integer $pending_reason
     * @param Integer $folder_responsible
     *
     * @return FolderModel
     */
    public function bootstrap(String $invoice_number, String $ship_name, String $ship_acronym, 
    $customer, String $supply_date,$receipt_date,$status, 
    $pending_reason,$folder_responsible): FolderModel
    {
        $this->invoice_number = $invoice_number;
        $this->ship_name = $ship_name;
        $this->ship_acronym = $ship_acronym;
        $this->customer = $customer;
        $this->supply_date = $supply_date;
        $this->receipt_date = $receipt_date;
        $this->status = $status;
        $this->pending_reason = $pending_reason;
        $this->folder_responsible = $folder_responsible;
        return $this;
    }

    /**
     * @param int $id
     * @param string $columns
     *
     * @return FolderModel|null
     */
    public function load(int $id, string $columns = '*'): ?FolderModel
    {
        $load = $this->read("SELECT 
            folders.id, 
            invoice_number, 
            ship_name, 
            ship_acronym, 
            customers.`name` AS customer_name, 
            supply_date, 
            receipt_date, 
            folder_status.`id` AS folder_status_id, 
            folder_status.`name` AS folder_status_name, 
            pending_reason, 
            folder_responsible AS folder_responsible_name
            FROM ".self::$entity." 
            INNER JOIN customers ON folders.customer = customers.id 
            LEFT JOIN folder_status ON folders.status = folder_status.id WHERE folders.id = :id", "id={$id}");

        if($this->fail() || !$load->rowCount())
        {
            return null;
        }

        return $load->fetchObject(__CLASS__);
    }

    public function loadEdit($id, string $columns = '*')
    {
        $load = $this->read("SELECT {$columns} FROM ".self::$entity." WHERE id = :id", "id={$id}");

        if($this->fail() || !$load->rowCount())
        {
            return null;
        }

        return $load->fetchObject(__CLASS__);
    }

    /**
     * @param string $name
     * @param string $columns
     *
     * @return FolderModel|null
     */
    public function find(string $invoice_number, string $columns = '*'): ?FolderModel
    {
        $find = $this->read("SELECT {$columns} FROM ".self::$entity." WHERE invoice_number = :invoice_number", "invoice_number={$invoice_number}");

        if($this->fail() || !$find->rowCount())
        {
            return null;
        }

        return $find->fetchObject(__CLASS__);
    }

    /**
     * @param string $name
     * @param string $columns
     *
     * @return FolderModel|null
     */
    public function findByStatus(int $status, string $columns = '*')
    {
        $find = $this->read("SELECT {$columns} FROM ".self::$entity." WHERE status = :status", "status={$status}");

        if($this->fail() || !$find->rowCount())
        {
            return null;
        }

        return $find->fetchAll(\PDO::FETCH_CLASS, __CLASS__);
    }

    /**
     * @param string $search
     * @param string $columns
     *
     * @return FolderModel|null
     */
    public function search(string $search, string $columns = '*')
    {
        $find = $this->read("SELECT 
            folders.id, 
            invoice_number, 
            ship_name, 
            ship_acronym, 
            customers.`name` AS customer_name, 
            supply_date, 
            receipt_date, 
            folder_status.`id` AS folder_status_id, 
            pending_reason, 
            folder_responsible AS folder_responsible_name
            FROM folders
            INNER JOIN customers ON folders.customer = customers.id 
            LEFT JOIN folder_status ON folders.status = folder_status.id WHERE folders.`invoice_number` LIKE CONCAT('%', :search, '%') OR folders.`ship_acronym` LIKE CONCAT('%', :search, '%')", "search={$search}");

        if($this->fail() || !$find->rowCount())
        {
            return null;
        }

        return $find->fetchAll(\PDO::FETCH_CLASS, __CLASS__);
    }

    /**
     * @param int $limit
     * @param int $offset
     * @param string $columns
     *
     * @return FolderModel|null
     */
    public function all(int $limit = 30, int $offset = 0, string $columns = '*')
    {
        $all = $this->read("SELECT 
            folders.id, 
            invoice_number, 
            ship_name, 
            ship_acronym, 
            customers.`name` AS customer_name, 
            supply_date, 
            receipt_date, 
            folder_status.`id` AS folder_status_id, 
            pending_reason, 
            folder_responsible AS folder_responsible_name
            FROM ".self::$entity." 
            INNER JOIN customers ON folders.customer = customers.id 
            LEFT JOIN folder_status ON folders.status = folder_status.id 
            ORDER BY folders.id DESC 
            LIMIT :limit OFFSET :offset", "limit={$limit}&offset={$offset}");

        if($this->fail() || !$all->rowCount())
        {
            return null;
        }

        return $all->fetchAll(\PDO::FETCH_CLASS, __CLASS__);
    }

    /**
     * @return FolderModel|null
     */
    public function save()
    {
        // if(!$this->required())
        // {
        //     return null;
        // }

        // UPDATE FOLDER
        if(!empty($this->id))
        {
            $folderId = $this->id;

            $this->update(self::$entity, $this->safe(), "id=:id", "id={$folderId}");

            if($this->fail())
            {
                return null;
            }
        }
        // CREATE FOLDER
        else
        {
            $folderId = $this->create("INSERT INTO ".self::$entity." (invoice_number, ship_name, ship_acronym, customer, supply_date, 
            receipt_date, status, pending_reason, folder_responsible) VALUES
            (:invoice_number, :ship_name, :ship_acronym, :customer, :supply_date, :receipt_date, :status, :pending_reason, :folder_responsible)", $this->safe());
        }
        
        return $folderId;
    }

    /**
     * @return bool
     */
    public function destroy(): bool
    {
        $destroy = $this->delete(self::$entity, "id = :id", ['id'=>$this->id]);

        if($this->fail() || $destroy == null)
        {
            return null;
        }

        return true;
    }

    /**
     * @return bool
     */
    public function required(): bool
    {
        if(!$this->invoice_number || !$this->ship_name || !$this->ship_acronym || !$this->customer || !$this->supply_date || 
        !$this->receipt_date || !$this->status || !$this->ship_regime || !$this->pending_reason || !$this->folder_responsible)
        {
            return false;
        }

        return true;
    }
}