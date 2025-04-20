<?php

namespace App\Models;

class ShipTypeModel extends Model
{
    /**
     * @var array
     */
    protected static array $safe = ['id', 'created_at', 'updated_at'];

    /**
     * @var string
     */
    private static string $entity = 'ship_type';

    /**
     * @param String $name
     *
     * @return ShipTypeModel
     */
    public function bootstrap(String $name): ShipTypeModel
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param int $id
     * @param string $columns
     *
     * @return ShipTypeModel|null
     */
    public function load(int $id, string $columns = '*'): ?ShipTypeModel
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
     * @return ShipTypeModel|null
     */
    public function find(string $name, string $columns = '*'): ?ShipTypeModel
    {
        $find = $this->read("SELECT {$columns} FROM ".self::$entity." WHERE name = :name", "name={$name}");

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
     * @return ShipTypeModel|null
     */
    public function all(int $limit = 30, int $offset = 0, string $columns = '*'): ?ShipTypeModel
    {
        $all = $this->read("SELECT {$columns} FROM ".self::$entity." LIMIT :limit OFFSET :offset", "limit={$limit}&offset={$offset}");

        if($this->fail() || !$all->rowCount())
        {
            return null;
        }

        return $all->fetchAll(\PDO::FETCH_CLASS, __CLASS__);
    }

    /**
     * @return ShipTypeModel|null
     */
    public function save(): ?ShipTypeModel
    {

        if(!$this->required())
        {
            return null;
        }

        // UPDATE SHIP TYPE
        if(!empty($this->id))
        {
            $shipTypeId = $this->id;

            if($email->rowCount())
            {
                return null;
            }

            $this->update(self::$entity, $this->safe(), "id=:id", "id={$shipTypeId}");

            if($this->fail())
            {
                return null;
            }
        }
        // CREATE SHIP TYPE
        else
        {
            $shipTypeId = $this->create("INSERT INTO ".self::$entity." (name) VALUES (:name)", $this->safe());
        }

        $this->data = $this->read("SELECT * FROM ".self::$entity." WHERE id = :id", "id={$shipTypeId}")->fetchObject(__CLASS__);
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
        if(!$this->name)
        {
            return false;
        }

        return true;
    }
}