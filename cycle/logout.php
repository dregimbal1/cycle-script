<?php
// BY DAVID REGIMBAL
session_start(); 
unset($_SESSION['user']);
header("Location: ./login.php");
?> 
