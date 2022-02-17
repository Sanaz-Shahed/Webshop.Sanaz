<?php 

class Product {
    public $id;
    public $name;
    public $quantity;
    public $price;
    public $picture
    public $description;
    public $db
    

    function __construct($id = null, $name = null, $quantity = null, $price = null, $picture = null, $description = null) {
        $this->id = $id;
        $this->name = $name;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->picture = $picture;
        $this->description = $description;
        $this->db = newDatabase();
    }


    
    public function fetchAll() {
        $query = "SELECT * FROM Products;";
        return $this->db->runQuery($query);
    }

    public function insert() {
        $query = "INSERT INTO Products (id, name, quantity, price, picture, description)
        VALUES(:id, :name, :quantity, :price, :picture, :description);";
        
        $value = array(":id"=>$this->id, ":name"=>$this->name, ":quantity"=>$this->quantity,
        ":price"=>$this->price, ":picture"=>$this->picture, ":description"=>$this->description);

        $result =$this->db->runQuery($query, $value);
        return $result;
    }


    public function update() {         
        $query = "UPDATE Products SET id = :id, name = :name, quantity = :quantity,
        price = :price, picture = :picture, description = :description
        WHERE id = :id;";

        $value = array(":id"=>$this->id, ":name"=>$this->name, ":quantity"=>$this->quantity,
        ":price"=>$this->price, ":picture"=>$this->picture, ":description"=>$this->description,
        ":id"=>$this->id);

        $result =$this->db->runQuery($query, $value);
        return $result;
    }

    public function delete() {
        $query = "DELETE FROM Products WHERE id = :id;";
        $value = array(":orderID"=>$this->productID);
        $result =$this->db->runQuery($query);
        return $result;
    }


    
    public function flexFunction($flexQuery, $flexArray = null) {
        return $this->db->runQuery($flexQuery, $flexArray);
    }

}
?>