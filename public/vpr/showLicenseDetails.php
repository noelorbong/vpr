<?php

include "classes/DatabaseHelper.php";
include "classes/Maintenance.php";

$objectMaintenance = new Maintenance();

$ID = $_GET["x"];

$sqlStatement = "SELECT * FROM tbl_license WHERE id = '$ID'";
if($objectMaintenance->selectWithJoin($sqlStatement) != 0) {
    foreach ($objectMaintenance->selectWithJoin($sqlStatement) as $value) {
        ?>
        <tr>
            <td>LICENSE NO. : <span style="font-size: 15px; text-align: right"><?php print $value["license_no"]?></span></td>
        </tr>
        <tr>
            <td>FULL NAME : <span style="font-size: 15px; text-align: right"><?php print $value["last_name"].", ".$value["first_name"]." ".$value["middle_name"]?></span></td>
        </tr>
        <tr>
            <td>NATIONALITY : <span style="font-size: 15px; text-align: right"><?php print $value["nationality"]?></span></td>
        </tr>
        <tr>
            <td>GENDER : <span style="font-size: 15px; text-align: right"><?php print $value["gender"]?></span></td>
        </tr>
        <tr>
            <td>DATE OF BIRTH : <span style="font-size: 15px; text-align: right"><?php print $value["date_of_birth"]?></span></td>
        </tr>
        <tr>
            <td>WEIGHT : <span style="font-size: 15px; text-align: right"><?php print $value["weight"]?></span></td>
        </tr>
        <tr>
            <td>HEIGHT : <span style="font-size: 15px; text-align: right"><?php print $value["height"]?></span></td>
        </tr>
        <tr>
            <td>ADDRESS : <span style="font-size: 15px; text-align: right"><?php print $value["address"]?></span></td>
        </tr>
        <tr>
            <td>BLOOD TYPE : <span style="font-size: 15px; text-align: right"><?php print $value["blood_type"]?></span></td>
        </tr>
        <tr>
            <td>EYE COLOR : <span style="font-size: 15px; text-align: right"><?php print $value["eye_color"]?></span></td>
        </tr>
        <tr>
            <td>RESTRICTIONS : <span style="font-size: 15px; text-align: right"><?php print $value["restrictions"]?></span></td>
        </tr>
        <tr>
            <td>CONDITIONS : <span style="font-size: 15px; text-align: right"><?php print $value["conditions"]?></span></td>
        </tr>
        <tr>
            <td>EXPIRATION DATE : <span style="font-size: 15px; text-align: right"><?php print $value["expiration_date"]?></span></td>
        </tr>
        <tr>
            <td>REGISTRATION DATE : <span style="font-size: 15px; text-align: right"><?php print $value["reg_date"]?></span></td>
        </tr>
        <?php
    }
}

?>