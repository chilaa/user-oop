<?php

require_once ROOT . '/lib/DB.php';
require_once ROOT . '/lib/DB.php';

class Model
{
    private $configuration = array(
        'db_dsn' => 'mysql:host=localhost;dbname=task_manager',
        'db_user' => 'root',
        'db_pass' => 'Root123!',
    );

    private $pdo;
    private $database;

    public function __construct()
    {
        $this->database = new db($this->getPDO());
    }


    public function verifyUser()
    {

        $userName = $_POST['username'];
        $pass = $_POST['password'];
        $keeper = $_POST['remember'];
        echo $keeper;
        $user = $this->database->fetchSingleDataByName($userName);
        print_r($user);
        $hashedPassword = $user['password'];
        if (Password_verify($pass, $hashedPassword)) {
            session_start();
            $_SESSION['userId'] = $user['id'];
            if ($keeper == 'on') {
                $hour = time() + 3600 * 24 * 30;
                setcookie('username', $userName, $hour);
                setcookie('password', $pass, $hour);
            }
            $_SESSION['userName'] = $userName;
            header("Location: /users");
        } else {

            header("Location:/signIn?status=error");
            echo "incorrect username or password";
        }
    }

    public function isLogedIn()
    {
        session_start();
        if (!(isset($_SESSION['userId']) && isset($_SESSION['userName']))) {
            header("Location:/signIn");
        }
    }

    public function logOut()
    {
        session_start();
        unset($_SESSION['userId']);
        unset($_SESSION['userName']);
        header("Location:/signIn");
    }

    public function getAllUsers()
    {
        $this->isLogedIn();
        return $this->database->fetchAllData();
    }

    public function getSingleUser($name)
    {
        $this->isLogedIn();

        return $this->database->fetchSingleDataByName($name);
    }

    public function addToDB()
    {
        $passwordHash = password_hash($_POST['password'], 1);
        $query = sprintf("insert into register (userName, password, name) VALUES ('%s', '%s', '%s')",
            $_POST['userName'], $passwordHash, $_POST['name']);
        $status = $this->database->addToDB($query);
        if ($status) {
            header('Location:/signIn');
        } else header("Location:/signUp?status=error");
    }

    public function modelDeleteUser($id)
    {
        $query = "delete from register where id = $id";
        $status = $this->database->deleteUser($query);
        return $status;
    }

    public function updateUser($id)
    {
        if (isset($_POST['password']) && $_POST['password'] !== '') {
            $passwordHash = password_hash($_POST['password'], 1);
        } else $passwordHash = $this->database->fetchSingleDataById($id)['password'];

        $query = sprintf("update register set  userName='%s', password='%s',  name='%s' where id=$id ;",
            $_POST['userName'], $passwordHash, $_POST['name']);
        return $this->database->updateUser($query);
    }

    /**
     * @return PDO
     */
    public function getPDO()
    {
        if ($this->pdo === null) {
            $this->pdo = new PDO(
                $this->configuration['db_dsn'],
                $this->configuration['db_user'],
                $this->configuration['db_pass']
            );

            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return $this->pdo;
    }

    /**
     * @return PDO object
     */
    public function getDatabase()
    {
        return $this->database;
    }

    /**
     * @param PDO $database
     */
    public function setDatabase($database)
    {
        $this->database = $database;
    }


}