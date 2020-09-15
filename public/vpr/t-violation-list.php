<?php
include "classes/DatabaseHelper.php";
include "classes/Maintenance.php";

$objectMaintenance = new Maintenance();

$vID = $_GET["x"];

$sqlStatement = "SELECT * FROM tbl_violation WHERE vehicle_id = $vID";
if($objectMaintenance->selectWithJoin($sqlStatement) != 0) {
    foreach ($objectMaintenance->selectWithJoin($sqlStatement) as $value) {
        ?>
        <tr>
            <td><?php print $value["id"]?></td>
            <td><?php print $value["violation_name"]?></td>
            <td><?php print date("d F, Y", strtotime($value["violation_date"]))?></td>
            <td>
                <button onclick="deleteViolation(<?php print $value["id"]?>)" type="button" class="btn btn-danger active btn-sm">Delete</button>
            </td>
        </tr>
        <?php
    }
}
?>
<script>
    function deleteViolation($id) {
        if (confirm("Are you sure you want to delete")) {
            var txtID = $id;
            $.ajax({
                method: "GET",
                url: "ajax-delete-maitenance.php",
                data: {id: txtID, action: 'violation-delete'},
                success: function(){
                    alert("Success");
                    location.reload();
                }
            });

        }
        else {
        }
    }
</script>
