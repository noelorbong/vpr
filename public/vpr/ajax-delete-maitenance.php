<?php
    include "classes/DatabaseHelper.php";
    include "classes/Maintenance.php";

    $objectMaintenance = new Maintenance();

    $action = $_GET["action"];

    if ($action == "user-delete"){
        $txtID =$_GET["id"];

        $objectMaintenance->deleteRecord("tbl_user_info", "'$txtID'");

    }
    else if ($action == "user-access-delete"){
        $txtID =$_GET["id"];

        $objectMaintenance->deleteUserAccess("tbl_user", "'$txtID'");

    }

    else if ($action == "vehicle-delete"){
        $txtID =$_GET["id"];

        $objectMaintenance->deleteRecord("tbl_orcr", "'$txtID'");

    }

    else if ($action == "owner-delete"){
        $txtID =$_GET["id"];

        $objectMaintenance->deleteRecord("tbl_license", "'$txtID'");

    }

    else if ($action == "violation-delete"){
        $txtID =$_GET["id"];

        $objectMaintenance->deleteRecord("tbl_violation", "'$txtID'");

    }

?>