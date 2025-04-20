<?php

namespace App\Models;

class RemindersModel extends Model
{
    /**
     * @var array
     */
    protected static array $safe = ['id', 'created_at', 'updated_at'];

    /**
     * @var string
     */
    private static string $entity = 'reminders';

    /**
     * @param String $reminder
     * @param Integer $user_id
     *
     * @return RemindersModel
     */
    public function bootstrap(String $reminder, Integer $user_id): RemindersModel
    {
        $this->reminder = $reminder;
        $this->user_id = $user_id;
        return $this;
    }

    /**
     * @param int $id
     * @param string $columns
     *
     * @return RemindersModel|null
     */
    public function load(int $id, int $userId, string $columns = '*'): ?RemindersModel
    {
        $load = $this->read("SELECT {$columns} FROM ".self::$entity." WHERE id = :id AND user_id = :user_id", "id={$id}&user_id={$userId}");

        if($this->fail() || !$load->rowCount())
        {
            return null;
        }

        return $load->fetchObject(__CLASS__);
    }

    /**
     * @param string $reminder
     * @param string $columns
     *
     * @return RemindersModel|null
     */
    public function find(string $reminder, string $columns = '*'): ?RemindersModel
    {
        $find = $this->read("SELECT {$columns} FROM ".self::$entity." WHERE reminder LIKE ':reminder%' AND user_id = :user_id", "reminder={$reminder}&user_id={$userId}");

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
     * @return RemindersModel|null
     */
    public function all(int $userId, int $limit = 30, int $offset = 0, string $columns = '*')
    {
        $all = $this->read("SELECT {$columns} FROM ".self::$entity." WHERE user_id = :user_id LIMIT :limit", "user_id={$userId}&limit={$limit}");

        if($this->fail() || !$all->rowCount())
        {
            return null;
        }

        return $all->fetchAll(\PDO::FETCH_CLASS, __CLASS__);
    }

    /**
     * @return RemindersModel|null
     */
    public function save(): ?RemindersModel
    {

        if(!$this->required())
        {
            return null;
        }

        // UPDATE REMINDER
        if(!empty($this->id))
        {
            $reminderId = $this->id;

            $this->update(self::$entity, $this->safe(), "id=:id", "id={$reminderId}");

            if($this->fail())
            {
                return null;
            }
        }
        // CREATE REMINDER
        else
        {
            $reminderId = $this->create("INSERT INTO ".self::$entity." (reminder) VALUES (:reminder)", $this->safe());
        }

        $this->data = $this->read("SELECT * FROM ".self::$entity." WHERE id = :id", "id={$reminderId}")->fetchObject(__CLASS__);
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
        if(!$this->name || !$this->user_id)
        {
            return false;
        }

        return true;
    }
}