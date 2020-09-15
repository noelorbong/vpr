<?php
$objectMaintenance = new Maintenance();

class Maintenance extends DatabaseHelper
{
    public function selectAllRecords($table_name){
        $sqlStatement = "SELECT * FROM $table_name ORDER BY ID DESC";
        $queryStatement = $this->dbConnect()->query($sqlStatement);
        if($queryStatement->num_rows > 0){
            while($fetchStatement = $queryStatement->fetch_assoc()){
                $result[] = $fetchStatement;
            }
            return $result;
        }
        else{
            return 0;
        }
    }

    public function selectWithJoin($sqlStatement){
        $queryStatement = $this->dbConnect()->query($sqlStatement);
        if($queryStatement->num_rows > 0){
            while($fetchStatement = $queryStatement->fetch_assoc()){
                $result[] = $fetchStatement;
            }
            return $result;
        }
    }

    public function selectSpecificRecord($table_name, $condition){
        $sqlStatement = "SELECT * FROM $table_name WHERE $condition";
        $queryStatement = $this->dbConnect()->query($sqlStatement);
        if($queryStatement->num_rows > 0){
            while($fetchStatement = $queryStatement->fetch_assoc()){
                $result[] = $fetchStatement;
            }
            return $result;
        }
        else{
            return 0;
        }
    }

    public function insertRecord($table_name, $column_value){
        $sqlStatememt = "INSERT INTO $table_name () VALUES ($column_value)";
        $queryStatement = $this->dbConnect()->query($sqlStatememt);
    }

    public function updateRecord($table_name, $column_name_value, $condition){
        $sqlStatememt = "UPDATE $table_name set $column_name_value WHERE $condition";
        $queryStatement = $this->dbConnect()->query($sqlStatememt);
    }

    public function deleteRecord($table_name, $id){
        $sqlStatement = "DELETE FROM $table_name WHERE id = $id";
        $queryStatement = $this->dbConnect()->query($sqlStatement);
    }

    public function deleteUserAccess($table_name, $id){
        $sqlStatement = "DELETE FROM $table_name WHERE user_info_id = $id";
        $queryStatement = $this->dbConnect()->query($sqlStatement);
    }

    public function setId($id){
        if($id >= 0 && $id <= 9){
            return "00".$id;
        }
        elseif($id >= 10 && $id <= 99){
            return "0".$id;
        }
        else{
            return $id;
        }
    }

    public function auditTrail($txtAction){
        $txtUserId = $_SESSION["user_id"];
        $txtDate = date("Y-m-d");
        $txtTime = date("H:i:s");

        $tableSequence = "NULL, '$txtUserId', '$txtAction', '$txtDate', '$txtTime'";
        $this->insertRecord('audit_tbl', $tableSequence);
    }

}