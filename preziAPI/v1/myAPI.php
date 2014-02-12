<?php
/**********************************
API  by Jack Pelorus
[ jackpelorus@gmail.com ]
Created (25-10-2013) 
Last Modif (25-11-2013)
***********************************/
session_start();
include("simple_html_dom.php");
include("API.class.php");
// include our OAuth2 Server object
//include ("../../oauth2/server.php");
class myAPI extends API{ 

	//vars declaration

	public function __construct($request, $origin) {
        parent::__construct($request);
        // error reporting (this is a demo, after all!)
        ini_set('display_errors',0);//error_reporting(E_ALL);
    }
   
    public function testAPI(){

        return "API WORKS !!! CONGRATS"
    }


/***********************
    REST Response
 **********************/
// Requests from the same server don't have a HTTP_ORIGIN header
if (!array_key_exists('HTTP_ORIGIN', $_SERVER)) {
   $_SERVER['HTTP_ORIGIN'] = $_SERVER['SERVER_NAME'];
}
try {
    $API = new preziAPI($_REQUEST['request'], $_SERVER['HTTP_ORIGIN']);
    echo $API->processAPI();
} catch (Exception $e) {
    echo json_encode(Array('error' => $e->getMessage()));
}
?>
