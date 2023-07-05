<?php

require_once("rapi/rapi.php");

$rapi = new RAPI();
$rapi->Load("{reactioon-api-key}", "{reactioon-api-secret}");
$requestReturn = $rapi->Request("GET", "api/v2/bots/spot/all", array());
var_dump($requestReturn);

?>