<?php

class database_Model extends Model {

    function __construct() {
        parent::__construct();
    }

    public function create() {
        $errorinput = $this->testInput();
        if ($errorinput != []) {
            return $errorinput;
        } else {

            $result = $this->get();

            if (is_array($result)) {
                return "You cannot attribute the same ID to two different persons";
            } else {
                $sql = 'INSERT INTO `phpmysqlproject`.`employees`(`id`,`name`,`hiredate`)VALUES(:id ,:name , :hiredate)';
                $stmt = $this->db->prepare($sql);
                foreach ($this->inputs as $key => $value) {
                    $stmt->bindParam(':' . $key, $this->inputs[$key]);
                }
                $stmt->execute();

                return "A new employee enter and his ID is : " . $this->inputs['id'];
            }
        }
    }

    public function update() {

        $sql = 'UPDATE `phpmysqlproject`.`employees` SET `name` = :name ,`hiredate` = :hiredate WHERE `id` = :id;';
        $stmt = $this->db->prepare($sql);
        foreach ($this->inputs as $key => $value) {
            $stmt->bindParam(':' . $key, $this->inputs[$key]);
        }
        $stmt->execute();
        $result = $this->get();
        if ($result == null || is_string($result)) {
            return $result;
        } else {
            return "You have update the details of the employee number : " . $this->inputs['id'];
        }
    }

    public function getAll() {
        $sql = 'SELECT * FROM `phpmysqlproject`.`employees`';
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function get() {

        try {
            $sql = 'SELECT `employees`.`id`,`employees`.`name`,`employees`.`hiredate`FROM `phpmysqlproject`.`employees` WHERE id = :id';
            $stmt = $this->db->prepare($sql);
            $id = isset($this->inputs['id'])? $this->inputs['id'] : $this->inputs[2];
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->notFoundError($result);
            return $result;
        } catch (Exception $e) {
            return $e->getMessage() . "\n";
        }
    }

    public function notFoundError($x) {
        if ($x == null) {
            throw new Exception('This ID was not found');
        }
        return $x;
    }

    public function delete($id) {

        $sql = 'DELETE FROM `phpmysqlproject`.`employees` WHERE id = :id';
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return "You have delete the employee number : " . $id;
    }

    public function testInput() {
        $message = [];
        foreach ($this->inputs as $key => $value) {
            if ($value === '') {
                $message[$key] = $key . " is required";
            }
        }
        return $message;
    }

}
