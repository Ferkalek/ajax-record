<?php

$username = "root";
$password = "";
$hostname = "localhost";
$databasename = "record";

$connecDB = new mysqli($hostname, $username, $password, $databasename);
$connecDB->query("SET NAMES 'utf8'");