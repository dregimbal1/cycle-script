<?php
// BY DAVID REGIMBAL
require('libs/Smarty.class.php');

$smarty = new Smarty;

session_start();
if (!isset($_SESSION['user']))
{
 die ("Access Denied");
}

	
include("includes/dbc.php");
	
//Get variables stored in database
$getname = "SELECT wfmzname FROM wfmz";
$placename = mysql_query($getname);
$outputname = mysql_fetch_assoc($placename);

$getmsg = "SELECT wfmzmsg FROM wfmz";
$placemsg = mysql_query($getmsg);
$outputmsg = mysql_fetch_assoc($placemsg);

//Lets save data if we have to
if ($_POST['Submit'] == 'Save')
{

	$nameupdate = $_POST['wfmzname'];

	$msgupdate = $_POST['wfmzmsg'];

	mysql_query("UPDATE wfmz SET wfmzname = '$nameupdate'");

	mysql_query("UPDATE wfmz SET wfmzmsg = '$msgupdate'");

	header("Location: wfmz.php?msg=Settings Updated");

}	

$smarty->force_compile = true;
$smarty->debugging = false;
$smarty->caching = true;
$smarty->cache_lifetime = 120;

//Navigation
$page = "wfmz";
$smarty->assign('page', $page);


//Convert PHP variables to something smarty can read
$smarty->assign('wfmzn', $outputname['wfmzname']);
$smarty->assign('wfmzm', $outputmsg['wfmzmsg']);

//Say hello, get some user details
$smarty->assign('user', $_SESSION['user']);
$smarty->assign('cycleday', $DS_DISPLAY);

$smarty->assign("Name","Cycle Day Script",true);

$smarty->display('wfmz.tpl');
?>
