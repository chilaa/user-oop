<?php

namespace service;

class db
{
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }


    public function fetchAllData()
    {
        $statement = $this->pdo->prepare('SELECT * FROM register');
        $statement->execute();

        return $statement->fetchAll();
    }

    public function fetchSingleDataById($id)
    {
        $statement = $this->pdo->prepare('SELECT * FROM register WHERE id = :id');
        $statement->execute(array('id' => $id));
        return $statement->fetch(\PDO::FETCH_ASSOC);
    }

    public function fetchSingleDataByName($name)
    {
        $statement = $this->pdo->prepare('SELECT * FROM register WHERE userName=:username');
        $statement->execute(array('username' => $name));
        return $statement->fetch(\PDO::FETCH_ASSOC);

    }

    public function updateUser($query)
    {
        $statement = $this->pdo->query($query);
        if ($statement) return true; else return false;
    }


    public function addToDB($query)
    {
        return $statement = $this->pdo->query($query);
    }

    public function deleteUser($query)
    {
        return $statement=$this->pdo->query($query);
    }
    /**
     * @return \PDO
     */
    public function getPdo()
    {
        return $this->pdo;
    }

    /**
     * @param \PDO
     */
    public function setPdo(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }
}