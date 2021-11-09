<?php
class Tin{
  
    private $conn;
    private $table_name = "company";
  
    public $id;
    public $tin;
    public $companyname;
    public $address;
    public $ownerid;
    public $ownernames;
    public $phone;
    public $email;
  
    public function __construct($db){
        $this->conn = $db;
    }
}
?>