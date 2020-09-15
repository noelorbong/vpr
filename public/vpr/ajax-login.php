<?php
    session_start();
    include "classes/DatabaseHelper.php";
    include "classes/Maintenance.php";

    $objectMaintenance = new Maintenance();

    $action = $_GET["action"];

    if ($action == "login"){
        $txtUsername = $_GET["username"];
        $txtPassword = $_GET["password"];

        $sqlStatement = "SELECT tbl_user_info.info_lastname AS 'lastname', tbl_user_info.info_firstname as 'firstname', tbl_user_info.info_middlename as 'middlename'  FROM tbl_user JOIN tbl_user_info ON tbl_user.user_info_id = tbl_user_info.id WHERE tbl_user.user_name = '$txtUsername' AND tbl_user.user_password = '$txtPassword'";
        if($objectMaintenance->selectWithJoin($sqlStatement) != 0) {
            foreach ($objectMaintenance->selectWithJoin($sqlStatement) as $value) {
                print $value["lastname"]. ", ". $value["firstname"]." ".$value["middlename"];
            }
        }
    }
?>