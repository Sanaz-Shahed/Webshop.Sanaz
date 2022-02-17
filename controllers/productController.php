<?php 

include_once("./../classes/createInstanceFunctions.php");
include_once("./../controllers/mainController.php");


class ProductController extends MainController {

    private $createFunction = "createProduct";

    function __construct() {
        parent::__construct("Products", "Product");
    }

    public function getAll() {
        return $this->database->fetchAll($this->createFunction);
    }

    public function getById($id) {
        return $this->database->fetchById($id, $this->createFunction);
    }

    public function add($product) {
        try {

            $productToAdd = createProduct(null, $product->name, $product->quantity, $product->price, $product->description); //????
            return $this->database->insert($producToAdd);

        } catch(Exception $err) {
            throw new Exception("The product is not in correct format...", 500);
        }
    }

    public function delete($id) {
        return $this->database->delete($id);
    }
    public function update($id, $quantity) {
        return $this->database->freeQuery("UPDATE products set quantity = $quantity where id = $id");
    }

    public function getProductAndCategoryData($categoryID) {
        $query = "SELECT * FROM PRODUCT WHERE categoryID=" . $categoryID;
        return $this->freeQuery($query);
    }   

}


?>