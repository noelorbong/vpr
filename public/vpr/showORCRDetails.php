<?php

include "classes/DatabaseHelper.php";
include "classes/Maintenance.php";

$objectMaintenance = new Maintenance();

$ID = $_GET["x"];

$sqlStatement = "SELECT * FROM tbl_orcr WHERE id = '$ID'";
if($objectMaintenance->selectWithJoin($sqlStatement) != 0) {
    foreach ($objectMaintenance->selectWithJoin($sqlStatement) as $value) {
        ?>
        <tr>
            <td>CR NO. : <span style="font-size: 15px; text-align: right"><?php print $value["cr_no"]?></span></td>
        </tr>
        <tr>
            <td>MY FILE NO. : <span style="font-size: 15px; text-align: right"><?php print $value["my_file_no"]?></span></td>
        </tr>
        <tr>
            <td>PLATE NO. : <span style="font-size: 15px; text-align: right"><?php print $value["plate_no"]?></span></td>
        </tr>
        <tr>
            <td>ENGINE NO. : <span style="font-size: 15px; text-align: right"><?php print $value["engine_no"]?></span></td>
        </tr>
        <tr>
            <td>CHASSIS NO. : <span style="font-size: 15px; text-align: right"><?php print $value["chassis_no"]?></span></td>
        </tr>
        <tr>
            <td>DENOMINATION : <span style="font-size: 15px; text-align: right"><?php print $value["denomination"]?></span></td>
        </tr>
        <tr>
            <td>PISTON DISCPLACEMENT : <span style="font-size: 15px; text-align: right"><?php print $value["piston_displacement"]?></span></td>
        </tr>
        <tr>
            <td>CYLINDERS NO. : <span style="font-size: 15px; text-align: right"><?php print $value["cylinders_no"]?></span></td>
        </tr>
        <tr>
            <td>FUEL : <span style="font-size: 15px; text-align: right"><?php print $value["fuel"]?></span></td>
        </tr>
        <tr>
            <td>MAKE : <span style="font-size: 15px; text-align: right"><?php print $value["make"]?></span></td>
        </tr>
        <tr>
            <td>SERIES : <span style="font-size: 15px; text-align: right"><?php print $value["series"]?></span></td>
        </tr>
        <tr>
            <td>BODY TYPE : <span style="font-size: 15px; text-align: right"><?php print $value["body_type"]?></span></td>
        </tr>
        <tr>
            <td>BODY NO. : <span style="font-size: 15px; text-align: right"><?php print $value["body_no"]?></span></td>
        </tr>
        <tr>
            <td>YEAR MODEL : <span style="font-size: 15px; text-align: right"><?php print $value["year_model"]?></span></td>
        </tr>
        <tr>
            <td>GROSS WT : <span style="font-size: 15px; text-align: right"><?php print $value["gross_wt"]?></span></td>
        </tr>
        <tr>
            <td>NET WT. : <span style="font-size: 15px; text-align: right"><?php print $value["net_wt"]?></span></td>
        </tr>
        <tr>
            <td>SHIPPING WT. : <span style="font-size: 15px; text-align: right"><?php print $value["shipping_wt"]?></span></td>
        </tr>
        <tr>
            <td>NET CAPACITY. : <span style="font-size: 15px; text-align: right"><?php print $value["net_capacity"]?></span></td>
        </tr>
        <tr>
            <td>OWNER NAME : <span style="font-size: 15px; text-align: right"><?php print $value["owner_name"]?></span></td>
        </tr>
        <tr>
            <td>OWNER COMPLETE ADDRESS : <span style="font-size: 15px; text-align: right"><?php print $value["complete_address"]?></span></td>
        </tr>
        <tr>
            <td>OR NO. : <span style="font-size: 15px; text-align: right"><?php print $value["or_no"]?></span></td>
        </tr>
        <tr>
            <td>OR DATE : <span style="font-size: 15px; text-align: right"><?php print $value["or_date"]?></span></td>
        </tr>
        <tr>
            <td>AMOUNT : <span style="font-size: 15px; text-align: right"><?php print $value["amount"]?></span></td>
        </tr>
        <tr>
            <td>DATE REG. : <span style="font-size: 15px; text-align: right"><?php print $value["date"]?></span></td>
        </tr>
        <?php
    }
}
?>

?>