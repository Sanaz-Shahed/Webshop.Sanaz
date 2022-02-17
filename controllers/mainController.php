<?php 

include_once("./../classes/database.php");

abstract class MainController {

    public $database;

    function __construct($table, $class) {
        $this->database = new Database($table, $class);
    }

    abstract public function getAll();
    abstract public function getById($id);
    abstract public function add($product);
    abstract public function delete($id);
    
}

?>