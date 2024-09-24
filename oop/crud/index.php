<?php

class db_connect
{
    protected $conn;

    public function __construct()
    {
        $this->conn = new mysqli('localhost', 'root', "", 'oop_crud');
    }
}

class crud extends db_connect
{
    public function read($table, $id = null, $columns = null)
    {
        if ($id == null && $columns == null) {
            $sql = "SELECT * FROM $table";
        } else if ($id != null && $columns == null) {
            $sql = "SELECT * FROM $table WHERE id = $id";
        } else if ($columns != null && $id == null) {
            $columns = implode(',', $columns);
            $sql = "SELECT $columns FROM $table";
        } else if ($id != null && $columns != null) {
            $columns = implode(',', $columns);
            $sql = "SELECT $columns FROM $table WHERE id = $id";
        }

        $result = $this->conn->query($sql);
        return $result->fetch_all();
    }

    public function delete($table, $id)
    {
        $sql = "DELETE FROM $table WHERE id = $id";
        $this->conn->query($sql);

        return 'data deleted from the database';
    }
}


// $crudClass = new crud;
// print_r($crudClass->read('students', 1, ['name', 'email']));
// echo $crudClass->delete('students', 1);

// $name = $_POST['name'];
// $email = $_POST['email'];
// $address = $_POST['address'];

// $crudClass = new crud;
// $crudClass->insert('users', ['name' => $name, 'email' => $email, 'address' => $address]);
