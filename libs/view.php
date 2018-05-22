<?php

class View {

    public $id = "";
    public $hiredate = "";
    public $name = "";

    function __construct() {
        
    }

    public function render($msg) {
        require_once "views/$msg.php";
    }

    public function publishTable($array) {
        if ($array == null || is_string($array)) {
            return $array;
        } else {
            $buffer = "<table border = 1>";
            $buffer . "<tr>";
            foreach (array_keys($array[0]) as $headings) {
                $buffer .= "<th>$headings</th>";
            };
            $buffer .= "</tr>";
            foreach ($array as $row) {
                $buffer .= "<tr>";
                foreach ($row as $cell) {
                    $buffer .= "<td>$cell</td>";
                }
                $buffer .= "<td><a href=" . Config::$URL . "database/edit/" . $row['id'] .">EDIT</a><td>";
                $buffer .= "<td><a href=" . Config::$URL . "database/delete/" . $row['id']. ">DELETE</a><td>";
                $buffer .= "</tr>";
            }
            $buffer .= "</table>";
            return $buffer;
        }
    }

}
