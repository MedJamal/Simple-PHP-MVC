<?php

class User extends Model {

    /*
     * Fetch all users
     */
    public function all(){

        $this->query("SELECT * FROM users");

        $result = $this->resultSet();

        return $result;

    }

    /*
     * Fetch user by id
     */
    public function where($id){

        $this->query('SELECT * FROM users WHERE id = :id');

        $this->bind(':id', $id);

        $result = $this->resultSet();

        return !empty($result) ? $result : false;

//        return $result;

    }

    /*
     * Insert user
     */
    public function insert($name, $email, $password){

        $this->query('INSERT INTO users (name, email, password) VALUES(:name, :email, :password)');

        $this->bind(':name', $name);
        $this->bind(':email', $email);
        $this->bind(':password', $password);

        $this->execute();

        // Check if user inserted and return
        return $this->lastInsertId() ? $this->lastInsertId() : false;

    }

    /*
     * Delete user
     */
    public function delete($id){

        $this->query('DELETE FROM users WHERE id = :id');

        $this->bind(':id', $id);

        // Validation: Check if user exist
//        $this->where($id);

        return $this->execute();

    }

}




