<?php

date_default_timezone_set("Asia/Manila");
class DatabaseHelper
{
    private $dbHost, $dbUser, $dbPassword, $dbName;
    public function dbConnect(){
        $this->dbHost = 'localhost';
        $this->dbUser = 'pi';
        $this->dbPassword = 'raspberry';
        $this->dbName = 'vpr';

        $dbConString = new mysqli($this->dbHost, $this->dbUser, $this->dbPassword, $this->dbName);
        return $dbConString;
    }
}