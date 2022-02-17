<?php

include_once("./../classes/createInstanceFunctions.php");
include_once("./../controllers/mainController.php");


class categoryController extends MainController {
    private $createFunction = "createOrderList";

    function __construct() {
        parent::__construct("categories", "Category");
    }

    public function getAll() {
        return $this->database->fetchAll($this->createFunction);

    }

    public function getById($id) {

        return $this->
    }
}