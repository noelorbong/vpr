<?php
    include "classes/DatabaseHelper.php";
    include "classes/Maintenance.php";

    $objectMaintenance = new Maintenance();

    $action = $_GET["action"];

    if ($action == "user-add"){
        $txtFname =$_GET["fname"];
        $txtLname =$_GET["lname"];
        $txtMname =$_GET["mname"];
        $txtContact =$_GET["contact"];
        $txtBdate =$_GET["bdate"];
        $txtAddress =$_GET["address"];

        $objectMaintenance->insertRecord("tbl_user_info", "'NULL','$txtFname', '$txtLname', '$txtMname', '$txtContact', '$txtBdate', '$txtAddress'");

    }

    else if ($action == "user-access"){
        $txtUserName =$_GET["username"];
        $txtPassword =$_GET["password"];
        $txtUserInfoId =$_GET["infoid"];

        $objectMaintenance->insertRecord("tbl_user", "'NULL','$txtUserName', '$txtPassword', '$txtUserInfoId'");

    }

    else if ($action == "vehicle-add"){
        $txtOwnerId =$_GET["owner"];
        $txtPlateNumber =$_GET["platenumber"];
        $txtVehicleDesc =$_GET["vehicledesc"];

        $objectMaintenance->insertRecord("tbl_vehicle", "'NULL','$txtPlateNumber', '$txtVehicleDesc', '$txtOwnerId', '0'");

    }

    else if ($action == "owner-add"){
        $txtownername =$_GET["fullname"];
        $txtLicense =$_GET["license"];
        $txtContactNumber =$_GET["contact"];
        $txtCompleteAddress =$_GET["address"];

        $objectMaintenance->insertRecord("tbl_owner", "'NULL','$txtownername', '$txtCompleteAddress', '$txtContactNumber', '$txtLicense'");

    }

    else if ($action == "license-add"){
        $txtLastName = $_GET["lastname"];
        $txtFirstName = $_GET["firstname"];
        $txtMiddleName = $_GET["middlename"];
        $txtNationality = $_GET["nationality"];
        $txtGender = $_GET["gender"];
        $txtBirthDate = $_GET["bdate"];
        $txtWeight = $_GET["weight"];
        $txtHeight = $_GET["height"];
        $txtAddress = $_GET["address"];
        $txtExpDate = $_GET["expdate"];
        $txtBloodType = $_GET["bloodtype"];
        $txtEyeColor = $_GET["eyecolor"];
        $txtRestrictions = $_GET["restrictions"];
        $txtConditions =$_GET["conditions"];
        $txtLicense =$_GET["license"];
        $currentDate = date("Y-m-d H:i:s");


        $objectMaintenance->insertRecord("tbl_license", "'NULL','$txtLastName', '$txtFirstName', '$txtMiddleName', '$txtNationality', '$txtGender', '$txtBirthDate', '$txtWeight', '$txtHeight', '$txtAddress', '$txtExpDate', '$currentDate', '$txtBloodType', '$txtEyeColor', '$txtRestrictions', '$txtConditions', '$txtLicense'");

    }

    else if ($action == "violation-add"){
        $txtvehicleid =$_GET["id"];
        $txtViolationName =$_GET["violation"];
        $currentDate = date("Y-m-d H:i:s");

        $objectMaintenance->insertRecord("tbl_violation", "'NULL','$txtViolationName', '$currentDate', '$txtvehicleid'");

    }

    else if ($action == "orcr-add"){
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

        $objectMaintenance->insertRecord("tbl_orcr", "'NULL','$currentDate', '$txtCRNo', '$txtMyFileNo','$txtPlateNo','$txtEngineNo','$txtChasisNo','$txtDemonitation','$txtPistionDisplacement','$txtCylinderNo','$txtFuel','$txtMake','$txtSeries','$txtBodyType','$txtBodyNo','$txtYearModel','$txtGrossWt','$txtNetWt','$txtShippingWt','$txtNetCapacity','$txtOwnerName','$txtCompleteAddress', '$txtOrNo','$txtOrDate','$txtAmount'");

    }
?>