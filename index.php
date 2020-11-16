<?php
require "functions.php";
require "DomXML.php";
error_reporting(E_ALL);

$url = "https://www.levestates.com/wp-json/myhome/v1/estates";
$page = 1;
$dom = new DomXML();
$res = 1;

while ($res !== 0){

    $jsonRes = get_json($url,100,$page);
    if(json_decode($jsonRes, true)["found_results"] !== 0){

        $dom->parsJson($jsonRes);

        $page++;

    }else{
        $res = 0;
    }



}




echo "<plaintext>";
echo $dom->saveXML();
echo "</plaintext>";
