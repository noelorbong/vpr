<?php
include "classes/DatabaseHelper.php";
include "classes/Maintenance.php";

$objectMaintenance = new Maintenance();


$objectMaintenance->insertRecord("tbl_user", "'NULL', 'sample 1', 'sample 2'");

?>