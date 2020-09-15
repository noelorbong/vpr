<?php
    include "classes/DatabaseHelper.php";
    include "classes/Maintenance.php";

    $objectMaintenance = new Maintenance();

    $action = $_GET["action"];

    if ($action == "user-update"){
        $txtId = $_GET["id"];
        $txtFname =$_GET["fname"];
        $txtLname =$_GET["lname"];
        $txtMname =$_GET["mname"];
        $txtContact =$_GET["contact"];
        $txtBdate =$_GET["bdate"];
        $txtAddress =$_GET["address"];

        $objectMaintenance->updateRecord("tbl_user_info", "info_firstname = '$txtFname', info_lastname = '$txtLname', info_middlename = '$txtMname', info_contact= '$txtContact', info_bdate = '$txtBdate', info_address = '$txtAddress'", "id = '$txtId'");

    }

    else if ($action == "user-access-update"){
        $txtId = $_GET["id"];
        $txtUserName =$_GET["username"];
        $txtPassword =$_GET["password"];

        $objectMaintenance->updateRecord("tbl_user", "user_name = '$txtUserName', user_password = '$txtPassword'", "user_info_id = '$txtId'");

    }

    else if ($action == "vehicle-update"){
        $txtId = $_GET["id"];
        $txtCRNo =$_GET["crno"];
        $txtMyFileNo =$_GET["myfileno"];
        $txtPlateNo =$_GET["plateno"];
        $txtEngineNo =$_GET["engineno"];
        $txtChasisNo =$_GET["chasisno"];
        $txtDemonitation =$_GET["demonitation"];
        $txtPistionDisplacement =$_GET["pistiondisplacement"];
        $txtCylinderNo =$_GET["cylindersno"];
        $txtFuel =$_GET["fuel"];
        $txtMake =$_GET["make"];
        $txtSeries =$_GET["series"];
        $txtBodyType =$_GET["bodytype"];
        $txtBodyNo =$_GET["bodyno"];
        $txtYearModel =$_GET["yearmodel"];
        $txtGrossWt =$_GET["grosswt"];
        $txtNetWt =$_GET["netwt"];
        $txtShippingWt =$_GET["shippingwt"];
        $txtNetCapacity =$_GET["netcapacity"];
        $txtOwnerName =$_GET["ownername"];
        $txtCompleteAddress =$_GET["completeaddress"];
        $txtOrNo =$_GET["orno"];
        $txtOrDate =$_GET["ordate"];
        $txtAmount =$_GET["amount"];
        $currentDate = date("Y-m-d H:i:s");

        $objectMaintenance->updateRecord("tbl_orcr", "cr_no = '$txtCRNo', my_file_no = '$txtMyFileNo', plate_no = '$txtPlateNo', engine_no = '$txtEngineNo', chassis_no = '$txtChasisNo', denomination = '$txtDemonitation', pistion_displacement = '$txtPistionDisplacement', cylinders_no = '$txtCylinderNo', fuel = '$txtFuel', make = '$txtMake', series = '$txtSeries', body_type = '$txtBodyType', body_no = '$txtBodyNo', year_model = '$txtYearModel', gross_wt = '$txtGrossWt', net_wt = '$txtNetWt', shipping_wt = '$txtShippingWt', net_capacity = '$txtNetCapacity', owner_name = '$txtOwnerName', complete_address = '$txtCompleteAddress', or_no = '$txtOrNo', or_date = '$txtOrDate', amount = '$txtAmount'", "id = '$txtId'");

    }

    else if ($action == "owner-update"){
        $txtId = $_GET["id"];
        $txtownername =$_GET["fullname"];
        $txtLicense =$_GET["license"];
        $txtContactNumber =$_GET["contact"];
        $txtCompleteAddress =$_GET["address"];

        $objectMaintenance->updateRecord("tbl_owner", "owner_name = '$txtownername', owner_address = '$txtCompleteAddress', owner_contact = '$txtContactNumber', owner_license = '$txtLicense'", "id = '$txtId'");

    }

    else if ($action == "missingto1-update"){
        $txtId = $_GET["id"];
        $objectMaintenance->updateRecord("tbl_vehicle", "ismissing = '1'", "id = '$txtId'");

    }

    else if ($action == "missingto0-update"){
        $txtId = $_GET["id"];
        $objectMaintenance->updateRecord("tbl_vehicle", "ismissing = '0'", "id = '$txtId'");

    }


?>