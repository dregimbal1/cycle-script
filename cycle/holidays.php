<?php
// BY DAVID REGIMBAL
session_start();

require('libs/Smarty.class.php');
require('libs/SmartyPaginate.class.php');

include('includes/dbc.php');

$smarty =& new Smarty;

    // required connect
    SmartyPaginate::connect();

if (!isset($_SESSION['user']))
{
 die ("Access Denied");
}


    // set items per page
    SmartyPaginate::setLimit(5);
	
    // assign your db results to the template
    $smarty->assign('results', get_db_results());
	
	// assign the $paginate_* variables
	SmartyPaginate::assign($smarty); 

	
if ($_POST['Submit'] == 'Save')
{
	mysql_query("INSERT INTO holidays
	              (`omit`)
				  VALUES
				  ('$_POST[omit]')") or die(mysql_error());
				  
	header("Location: holidays.php?msg=Settings Updated");
	
}	

include("includes/cron.php");

   class someClass{

        //Function for removing the post
        function removePost(){
            if(isset($_POST['delete_id']) && (!empty($_POST['delete_id']))) {
                $delete_id = mysql_real_escape_string($_POST['delete_id']);

                $result = mysql_query("DELETE FROM holidays WHERE post_id='".$delete_id."'");
                if($result !== false) {
                    //echo 'true';
                }
            }
        }
    }
			if ($_POST['Del'] == 'Delete') {									header("Location: holidays.php?msg=Settings Updated");			}
			
$i = new someClass;
$smarty->assign('remove', $i->removePost());			

			

$smarty->force_compile = true;
$smarty->debugging = false;
$smarty->caching = false;
$smarty->cache_lifetime = 120;

//Navigation
$page = "holidays";
$smarty->assign('page', $page);


//Say hello, get some user details
$smarty->assign('user', $_SESSION['user']);
$smarty->assign('cycleday', $DS_DISPLAY);

$smarty->assign("Name","Cycle Day Script",true);



$smarty->display('holidays.tpl');

    function get_db_results() {

        $_query = sprintf("SELECT SQL_CALC_FOUND_ROWS * FROM holidays LIMIT %d,%d",
            SmartyPaginate::getCurrentIndex(), SmartyPaginate::getLimit());
        
        $_result = mysql_query($_query);

        while($_row = mysql_fetch_array($_result)){
			$_data[] = $_row;
        }
        
        // now we get the total number of records from the table
        $_query = "SELECT FOUND_ROWS() as total";
        $_result = mysql_query($_query);
        $_row = mysql_fetch_array($_result, MYSQL_ASSOC);
        
        SmartyPaginate::setTotal($_row['total']);

        mysql_free_result($_result);
        
        return $_data;
		
    }
?>