<?php

namespace CRUD\Helper;


class DBConnector
{


    /** @var mixed $db */
    private $db;
    private $localhost;
    private $pass;
    private $username;
    private $dbname;

    public function __construct($localhost, $pass, $username, $dbname)
    {
        $this->localhost = $localhost;
        $this->pass = $pass;
        $this->username = $username;
        $this->dbname = $dbname;
    }

    /**
     * @throws \Exception
     * @return void
     */
    public function connect(): void
    {
        $this->db = mysqli_connect("localhost", "root", "", "test");

        // Check connection
        if ($this->db->connect_error) {
            die("Connection failed: " .  $this->db->connect_error);
        }
        echo "Connected successfully";
    }

    /**
     * @param string $query
     * @return bool
     */
    public function execQuery(string $query): bool
    {
        if ($this->db->query($query) === TRUE) {
            echo "successfully";
            $this->db->close();
            return true;

        } else {
            echo "Error: " . $query . "<br>" . $this->db->error;
            $this->db->close();
            return false;
        }


    }

    /**
     * @param string $message
     * @throws \Exception
     * @return void
     */
    private function exceptionHandler(string $message): void
    {
        echo  $message;
    }
}
