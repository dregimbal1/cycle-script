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
$page = "tips";
$smarty->assign('page', $page);

//Say hello, get some user details
$smarty->assign('user', $_SESSION['user']);
$smarty->assign('cycleday', $DS_DISPLAY);

$smarty->assign("Name","Cycle Day Script",true);

$smarty->display('tips.tpl');

   
?>