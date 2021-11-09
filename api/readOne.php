<?php
ini_set( 'display_errors', 0 );
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../database.php';
include_once '../api/nid.php';
  
// instantiate database and nid object
$database = new Database();
$db = $database->getConnection();
  
// initialize object
$nid = new Nid($db);


$nid->nid = isset($_GET['nid']) ? $_GET['nid'] : die(json_encode(array("message" => "ID not provided!!!")));
// query nid
$nid->readOne();


print_r($nid->readOne());
//die();

//$nid_arr=array();
$nid_arr["records"]=array();

if($nid->nid!=null){
    // create array
    $nid_arr["records"][] = array(
        "nid" => $nid->nid,
        "firstname" => $nid->firstname,
        "lastname" => $nid->lastname,
        "phonenumber" => $nid->phonenumber,
        "address" => $nid->address,
        "dateofbirth" => $nid->dateofbirth,
        "placeofbirth" => $nid->placeofbirth,
        "picture" => $nid->picture
  
    );
  
    //array_push($nid_arr["records"], $nid_item);
    // set response code - 200 OK
    http_response_code(200);
  
    // make it json format
    echo json_encode($nid_arr);
}
  
else{
    // set response code - 404 Not found
    http_response_code(404);
  
    // tell the user product does not exist
    $status = array('status' => http_response_code(),'message' => 'ID does not exist');
    echo json_encode($status);
    //echo json_encode(array("message" => "ID does not exist."));
}
?>