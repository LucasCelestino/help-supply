<?php

namespace App\Models;

class UserModel extends Model
{
    /**
     * @var array
     */
    protected static array $safe = ['id', 'created_at', 'updated_at'];

    /**
     * @var string
     */
    private static string $entity = 'users';

    /**
     * @param String $name
     * @param String $login
     * @param String $password
     *
     * @return UserModel
     */
    public function bootstrap(String $name, String $login, String $password): UserModel
    {
        $this->name = $name;
        $this->login = $login;
        $this->password = $password;
        return $this;
    }

    /**
     * @param int $id
     * @param string $columns
     *
     * @return UserModel|null
     */
    public function load(int $id, string $columns = '*'): ?UserModel
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
     * @return UserModel|null
     */
    public function find(string $login, string $columns = '*'): ?UserModel
    {
        $find = $this->read("SELECT {$columns} FROM ".self::$entity." WHERE login = :login", "login={$login}");

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
     * @return UserModel|null
     */
    public function all(int $limit = 30, int $offset = 0, string $columns = '*')
    {
        $all = $this->read("SELECT {$columns} FROM ".self::$entity." LIMIT :limit OFFSET :offset", "limit={$limit}&offset={$offset}");

        if($this->fail() || !$all->rowCount())
        {
            return null;
        }

        return $all->fetchAll(\PDO::FETCH_CLASS, __CLASS__);
    }

    /**
     * @return UserModel|null
     */
    public function save()
    {

        // if(!$this->required())
        // {
        //     return null;
        // }

        // UPDATE USER
        if(!empty($this->id))
        {
            $userId = $this->id;

            $this->update(self::$entity, $this->safe(), "id=:id", "id={$userId}");

            if($this->fail())
            {
                return null;
            }
        }
        // CREATE USER
        else
        {
            $userId = $this->create("INSERT INTO ".self::$entity." (name,login,password) VALUES (:name,:login,:password)", $this->safe());
        }

        return $userId;

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
        if(!$this->name || !$this->login || !$this->password)
        {
            return false;
        }

        return true;
    }
}