<?php

namespace CRUD\Helper;

class PersonHelper
{
    public function insert()
    {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $username = $_POST['username'];
        $sql = "INSERT INTO users (firstName, lastName, userName)
        VALUES ('$firstName', '$lastName', '$username')";
                $this->db->execQuery($sql);

    }

    public function fetch(int $id)
    {

        $sql = "SELECT id, firstName, lastName, userName FROM users WHERE id='$id'";
        $result = $this->db->execQueryForFecth($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "id: " . $row["id"] . " - Name: " . $row["firstName"] . " " . $row["lastName"] . " " . $row["username"] . "<br>";
            }
        } else {
            echo "0 result";
    }}

    public function fetchAll()
    {

        $sql = "SELECT * FROM users";
        $result = $this->db->execQueryForFecth($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "id: " . $row["id"] . " - Name: " . $row["firstName"] . " " . $row["lastName"] . " " . $row["userName"] . "<br>";
            }
        } else {
            echo "0 result";
        }
    }

    public function update()
    {
        $fname = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $username = $_POST['userName'];

        $sql = "UPDATE users SET firstName='$fname', lastName='$lastName' WHERE userName='$username'";

        $this->db->execQuery($sql);
    }

    public function delete()
    {
        $username = $_POST['userName'];
        $sql = "DELETE FROM users WHERE userName='$username'";
        $this->db->execQuery($sql);
    }
}
