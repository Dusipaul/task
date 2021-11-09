<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../database.php';
include_once '../api/nid.php';
  
// instantiate database and nid object
$database = new Database();
$db = $database->getConnection();
  
// initialize object
$nid = new Nid($db);

// query nid
$stmt = $nid->read();
$num = $stmt->rowCount();
  
// check if more than 0 record found
if($num>0){
  
    // nid array
    $nid_arr=array();
    $nid_arr["records"]=array();
  
    // retrieve table contents
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        extract($row);
  
        $nid_item=array(
            "nid" => $nid,
            "firstname" => $firstname,
            "lastname" => $lastname,
            "address" => $address,
            "phonenumber" =>$phonenumber,
            "dateofbirth" => $dateofbirth,
            "placeofbirth" => $placeofbirth,
            "picture" => $picture
        );
  
        array_push($nid_arr["records"], $nid_item);
    }
  
    // set response code - 200 OK
    http_response_code(200);
  
    // show nid data in json format
    echo json_encode($nid_arr);
}

else{
  
    // set response code - 404 Not found
    http_response_code(404);
  
    // tell the user no record found
    echo json_encode(
        array("message" => "No records found.")
    );
}
