<?php

namespace App\Models;

class CustomerModel extends Model
{
    /**
     * @var array
     */
    protected static array $safe = ['id', 'created_at', 'updated_at'];

    /**
     * @var string
     */
    private static string $entity = 'customers';

    /**
     * @param String $name
     *
     * @return CustomerModel
     */
    public function bootstrap(String $name): CustomerModel
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param int $id
     * @param string $columns
     *
     * @return CustomerModel|null
     */
    public function load(int $id, string $columns = '*'): ?CustomerModel
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
     * @return CustomerModel|null
     */
    public function find(string $name, string $columns = '*'): ?CustomerModel
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
     * @return CustomerModel|null
     */
    public function all(int $limit = 30, int $offset = 0, string $columns = '*'): ?CustomerModel
    {
        $all = $this->read("SELECT {$columns} FROM ".self::$entity." LIMIT :limit OFFSET :offset", "limit={$limit}&offset={$offset}");

        if($this->fail() || !$all->rowCount())
        {
            return null;
        }

        return $all->fetchAll(\PDO::FETCH_CLASS, __CLASS__);
    }

    /**
     * @return CustomerModel|null
     */
    public function save(): ?CustomerModel
    {

        if(!$this->required())
        {
            return null;
        }

        // UPDATE CUSTOMER
        if(!empty($this->id))
        {
            $customerId = $this->id;

            if($email->rowCount())
            {
                return null;
            }

            $this->update(self::$entity, $this->safe(), "id=:id", "id={$customerId}");

            if($this->fail())
            {
                return null;
            }
        }
        // CREATE CUSTOMER
        else
        {
            $customerId = $this->create("INSERT INTO ".self::$entity." (name) VALUES (:name)", $this->safe());
        }

        $this->data = $this->read("SELECT * FROM ".self::$entity." WHERE id = :id", "id={$customerId}")->fetchObject(__CLASS__);
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