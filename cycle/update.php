<?php
// BY DAVID REGIMBAL
session_start();
require('libs/Smarty.class.php');
include('includes/dbc.php');
$smarty = new Smarty;
if (!isset($_SESSION['user']))
{
 die ("Access Denied");
}

$smarty->force_compile = true;
$smarty->debugging = false;
$smarty->caching = false;
$smarty->cache_lifetime = 120;
//Navigation
$page = "update";
$smarty->assign('page', $page);
//Check for latest version
 $version = "1.0.5"; //Version of the script, to check against CSV
$critical = FALSE; //Set Critical Variable to False
$update = FALSE; //Set None Critical to Fasle too
$url = "http://regimbal.me/server/update/cycle/cycle.csv"; //Link to your external CSV to check against
$fp = @fopen ($url, 'r'); //If the server is unreachable
$read = fgetcsv ($fp); //PHP fgetcsv
fclose ($fp); // Closes the connection
if ($read[0] > $version && $read[2] == "1") { $critical = TRUE; } // If its 1, set ciritcal to true
if ($read[0] > $version) { $update = TRUE; } // Anything other than 1 set update to true
if ($critical) {
$smarty->assign('criti', '<font color="red">There is a critical update available!</font><br/>You can get it at <a href="'.$read[3].'">'.$read[3].'</a> (Version: '.$read[1].') <br/><br/>');
}else if ($update){
$smarty->assign('criti', '<font color="green">There is a none critical update available!</font><br/>You can get it at <a href="'.$read[3].'">'.$read[3].'</a> (Version: '.$read[1].') <br/><br/>');
}else{
$smarty->assign('criti', '<font color="green">You are running the latest build!</font><br/>');
}

//Say hello, get some user details
$smarty->assign('user', $_SESSION['user']);
$smarty->assign('cycleday', $DS_DISPLAY);
$smarty->assign("Name","Cycle Day Script",true);
$smarty->display('update.tpl');
?>