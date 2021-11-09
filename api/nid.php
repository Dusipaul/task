<?php
class Nid{
  
    private $conn;
    private $table_name = "clients";
  
    public $nid;
    public $firstname;
    public $lastname;
    public $phonenumber;
    public $address;
    public $dateofbirth;
    public $placeofbirth;
    public $picture;
  
    public function __construct($db){
        $this->conn = $db;
    }

function read(){
  
    // select all query
    $query = "SELECT
                *
            FROM
                " . $this->table_name . "";
  
    // prepare query statement
    $stmt = $this->conn->prepare($query);
  
    // execute query
    $stmt->execute();
  
    return $stmt;
}

function readOne(){
  
    // select all query
    $query = "SELECT
                nid, firstname, lastname, phonenumber, address, dateofbirth, placeofbirth, picture
            FROM
                " . $this->table_name . "
                WHERE nid = ? LIMIT 0,1";

    // prepare query statement
    $stmt = $this->conn->prepare($query);
  
    //bind id
    $stmt->bindParam(1, $this->nid);
    // execute query
    $stmt->execute();    
  
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    // set values to object properties
    $this->nid = $row['nid'];
    $this->firstname = $row['firstname'];
    $this->lastname = $row['lastname'];
    $this->phonenumber = $row['phonenumber'];
    $this->address = $row['address'];
    $this->dateofbirth = $row['dateofbirth'];
    $this->placeofbirth = $row['placeofbirth'];
    $this->picture = $row['picture'];
    

}

function create(){
  
    // query to insert record
    $query = "INSERT INTO
                " . $this->table_name . "
            SET
                nid=:nid, firstname=:firstname, lastname=:lastname, phonenumber=:phonenumber, address=:address, dateofbirth=:dateofbirth, placeofbirth=:placeofbirth, picture=:picture";
  
    // prepare query
    $stmt = $this->conn->prepare($query);
  
    // sanitize
    $this->nid=htmlspecialchars(strip_tags($this->nid));
    $this->firstname=htmlspecialchars(strip_tags($this->firstname));
    $this->lastname=htmlspecialchars(strip_tags($this->lastname));
    $this->phonenumber=htmlspecialchars(strip_tags($this->phonenumber));
    $this->address=htmlspecialchars(strip_tags($this->address));
    $this->dateofbirth=htmlspecialchars(strip_tags($this->dateofbirth));
    $this->placeofbirth=htmlspecialchars(strip_tags($this->placeofbirth));
    $this->picture=htmlspecialchars(strip_tags($this->picture));
  
    // bind values
    $stmt->bindParam(":nid", $this->nid);
    $stmt->bindParam(":firstname", $this->firstname);
    $stmt->bindParam(":lastname", $this->lastname);
    $stmt->bindParam(":phonenumber", $this->phonenumber);
    $stmt->bindParam(":address", $this->address);
    $stmt->bindParam(":dateofbirth", $this->dateofbirth);
    $stmt->bindParam(":placeofbirth", $this->placeofbirth);
    $stmt->bindParam(":picture", $this->picture);
  
    // execute query
    if($stmt->execute()){
        return true;
    }
  
    return false;
      
}

}
?>