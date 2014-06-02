<?php
$dbname = 'regimbal_cycle';
$link = mysql_connect("localhost","regimbal_tactics","sponge12") or die("Couldn't make connection.");
$db = mysql_select_db($dbname, $link) or die("Couldn't select database");

// GRAB CURRENT CYCLE DAY HERE SO WE CAN OUPUT ELSEWHERE
$CD_DATA = "SELECT currday FROM settings";
$CD_GRAB = mysql_query($CD_DATA);
$CD_OUTPUT = mysql_fetch_assoc($CD_GRAB);
$CD_DISPLAY = $CD_OUTPUT['currday'];

// GRAB CYCLE NAME
$CN_DATA = "SELECT cyclename FROM settings";
$CN_GRAB = mysql_query($CN_DATA);
$CN_OUTPUT = mysql_fetch_assoc($CN_GRAB);
$CN_DISPLAY = $CN_OUTPUT['cyclename'];

// DISPLAY FULL STRING
$DS_DATA = "SELECT daystring FROM settings";
$DS_GRAB = mysql_query($DS_DATA);
$DS_OUTPUT = mysql_fetch_assoc($DS_GRAB);
$DS_DISPLAY = $DS_OUTPUT['daystring'];

// Database Settings
// Grab information for the script globally
$start_date_data = "SELECT startdate FROM settings";
$start_date_grab = mysql_query($start_date_data);
$start_date_output = mysql_fetch_assoc($start_date_grab);
$start_date_input = $start_date_output['startdate'];

$end_date_data = "SELECT enddate FROM settings";
$end_date_grab = mysql_query($end_date_data);
$end_date_output = mysql_fetch_assoc($end_date_grab);
$end_date_input = $end_date_output['enddate'];

$numcycle_data = "SELECT numcycle FROM settings";
$numcycle_grab = mysql_query($numcycle_data);
$numcycle_output = mysql_fetch_assoc($numcycle_grab);
$numcycle_input = $numcycle_output['numcycle'];
?>