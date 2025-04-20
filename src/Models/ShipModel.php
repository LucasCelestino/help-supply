<?php

namespace App\Models;

class ShipModel extends Model
{
    /**
     * @var array
     */
    protected static array $safe = ['id', 'created_at', 'updated_at'];

    /**
     * @var string
     */
    private static string $entity = 'ships';

    /**
     * @param String $name
     * @param String $acronym
     * @param String $harbor
     * @param Integer $type
     * @param String $supply_date
     * @param Integer $responsible
     * @param Integer $second_responsible
     * @param Integer $regime
     * @param Integer $status
     *
     * @return ShipModel
     */
    public function bootstrap(String $name, String $acronym, String $harbor, 
    Integer $type, String $supply_date, Integer $responsible, Integer $second_responsible,
    Integer $regime, Integer $status): ShipModel
    {
        $this->name = $name;
        $this->acronym = $acronym;
        $this->harbor = $harbor;
        $this->type = $type;
        $this->supply_date = $supply_date;
        $this->responsible = $responsible;
        $this->second_responsible = $second_responsible;
        $this->regime = $regime;
        $this->status = $status;
        return $this;
    }

    /**
     * @param int $id
     * @param string $columns
     *
     * @return ShipModel|null
     */
    public function load($id, string $columns = '*'): ?ShipModel
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
     * @return ShipModel|null
     */
    public function find(string $name, string $columns = '*'): ?ShipModel
    {
        $find = $this->read("SELECT {$columns} FROM ".self::$entity." WHERE name = :name", "name={$name}");

        if($this->fail() || !$find->rowCount())
        {
            return null;
        }

        return $find->fetchObject(__CLASS__);
    }

    /**
     * @param string $search
     * @param string $columns
     *
     * @return ShipModel|null
     */
    public function search(string $search, String $column, string $columns = '*'): ?ShipModel
    {
        $find = $this->read("SELECT {$columns} FROM ".self::$entity." WHERE $column LIKE ':$column%' ", "$column={$search}");

        if($this->fail() || !$find->rowCount())
        {
            return null;
        }

        return $find->fetchObject(__CLASS__);
    }

    /**
     * @param int $limit
     * @param int $offset
     * @param string $columns
     *
     * @return ShipModel|null
     */
    public function all(int $limit = 30, int $offset = 0)
    {
        $all = $this->read("SELECT ships.id, ships.`name` AS ship_name,acronym,harbor,ship_type.`name` AS ship_type_name, ships.supply_date, ship_responsibles.`name` AS ship_first_responsible, 
        ship_second_responsibles.`name` AS ship_second_responsible, ship_regime.`name` AS ship_regime, ships.`status`, ships.created_at 
        FROM ".self::$entity." INNER JOIN ship_type ON ships.type = ship_type.id
        LEFT JOIN ship_responsibles ON ships.responsible = ship_responsibles.id 
        LEFT JOIN ship_second_responsibles ON ships.second_responsible = ship_second_responsibles.id 
        LEFT JOIN ship_regime ON ships.regime = ship_regime.id
        LIMIT :limit OFFSET :offset", "limit={$limit}&offset={$offset}");

        if($this->fail() || !$all->rowCount())
        {
            return null;
        }

        return $all->fetchAll(\PDO::FETCH_CLASS, __CLASS__);
    }

    /**
     * @return ShipModel|null
     */
    public function save(): ?ShipModel
    {

        if(!$this->required())
        {
            return null;
        }

        // UPDATE SHIP
        if(!empty($this->id))
        {
            $shipId = $this->id;

            $this->update(self::$entity, $this->safe(), "id=:id", "id={$shipId}");

            if($this->fail())
            {
                return null;
            }
        }
        // CREATE SHIP
        else
        {
            $shipId = $this->create("INSERT INTO ".self::$entity." (name, acronym, harbor, type, supply_date, responsible, second_responsible, regime, status) VALUES
            (:name, :acronym, :harbor, :type, :supply_date, :responsible, :second_responsible, :regime, :status)", $this->safe());
        }

        $this->data = $this->read("SELECT * FROM ".self::$entity." WHERE id = :id", "id={$shipId}")->fetchObject(__CLASS__);
        return $this;
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
        if(!$this->name || !$this->acronym || !$this->harbor || !$this->type || !$this->supply_date || 
        !$this->responsible || !$this->second_responsible || !$this->regime || !$this->status)
        {
            return false;
        }

        return true;
    }
}