<?php

try {

    include_once("./../controllers/productController.php");

    if($_SERVER["REQUEST_METHOD"] == "GET") {

        if($_GET["action"] == "getAll") {
            
            $controller_obj = new ProductController();
            echo(json_encode($controller_obj->getAll()));
            exit;
            
        } else if($_GET["action"] == "getById") {
            
            $controller_obj = new ProductController();

            if(!isset($_GET["id"])) {
                throw new Exception("Missing ID", 501);
                exit;
            }
            
            echo(json_encode($controller_obj->getById((int)$_GET["id"])));
            exit;
            
        }
        
    } else if($_SERVER["REQUEST_METHOD"] == "POST") {
        
        if($_POST["action"] == "add") {

            if(!isset($_POST["product"])) {
                throw new Exception("Missing product...", 501);
                exit;
            }
            
            $controller_obj = new ProductController();
            
            echo(json_encode($controller_obj->add(json_decode($_POST["product"]))));
            exit;
            
        } else if($_POST["action"] == "delete") {
            
            $controller_obj = new ProductController();

            if(!isset($_POST["id"])) {
                throw new Exception("Missing ID", 501);
                exit;
            }
            
            echo(json_encode($controller_obj->delete((int)$_POST["id"])));
            exit;

        }

    }

} catch(Exception $err) {
    echo json_encode(array("Message" => $err->getMessage(), "Status" => $err->getCode()));
}

?>