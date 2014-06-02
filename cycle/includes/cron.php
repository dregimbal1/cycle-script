<?php
include ('dbc.php');

define ( 'SECONDS_IN_A_DAY', (60 * 60 * 24) );

$today = date ( "now" );
define ( 'DAY_SATURDAY', 6 );
define ( 'DAY_SUNDAY', 0 );

function isHoliday($date) 
{
	static $holidays;
	if( !isset( $holidays ) )
	{
		$call_holidays = mysql_query ( "SELECT omit FROM holidays" );
		$holidays == array ();
		while ( $row = mysql_fetch_assoc ( $call_holidays ) ) {
			$holidays [] = getdate ( strtotime( $row ['omit'] ) );
		}
		//var_dump( $holidays );
	}
	
	foreach ( $holidays as $holiday )
	{
		if( $holiday['mday'] == $date['mday'] && $holiday['mon'] == $date['mon'] && $holiday['year'] == $date['year'] ) {
			return TRUE;
		}
	}
	return false;
} 

function getAllDaysBetweenDates( $date_begin , $date_end )
{
	$dates = array ();
	
	$current_date = getdate( timeOfDayBegin($date_begin) );
	$date_end = getdate( timeOfDayBegin( $date_end ) ); // I don't like doing this but I must ensure it's the same time for the while statement.
	
	//var_dump( $current_date );
	//var_dump( $date_end );
	while( $current_date[0] <= $date_end[0] )
	{
		$dates [] = $current_date;
		$new_time = timeOfDayBegin( $current_date );
		$current_date = getdate ( ($current_date[0] + SECONDS_IN_A_DAY ));
	}
	return $dates;
}

function timeOfDayBegin( $date )
{
	return mktime( 12 , 1 , 1 , $date['mon'] , $date['mday'] , $date['year'] );
}

$start_date = getdate( strtotime ( $start_date_input ));
$stop_date =  getdate( strtotime( $end_date_input ));

$current_step = 1;
$step_limit = $numcycle_input;

$dates = getAllDaysBetweenDates( $start_date , $stop_date );

function printMonthStart( $month , $year , $week_day_start )
{
		
		for($i = 0; $i < $week_day_start; $i ++)
		{
			printDayColumn( "##" , "--" );
		}	
}

function printMonthEnd( $last_day_of_week )
{
	 for( $i = $last_day_of_week ; $i < 6 ; $i++ )
	 	printDayColumn( "##" , "--" );


}

function printDayColumn( $day_of_month , $day_of_cycle )
{
	
}


	function doDaysMatch( $date, $date_match ) 
	{
		if( $date_match['mday'] == $date['mday'] && $date_match['mon'] == $date['mon'] && $date_match['year'] == $date['year'] ) 
		{
			return TRUE;
		}
		
		return false;
	}

	function isToday( $date )
	{
		static $date_today;
		if( !isset( $date_today ) )
			$date_today = getdate();
		return doDaysMatch( $date , $date_today );

	}
	
	$todays_step = 0;
	
	foreach($dates as $date )
	{
	
		if( isToday( $date )  ){
			$todays_step = $current_step;
				if ( date("w") == DAY_SUNDAY || date("w") == DAY_SATURDAY )
				{
					$daystring = "Mondays " . $CN_DISPLAY . " " .  $todays_step;
					$update_string = "UPDATE settings SET daystring = '$daystring'";
					mysql_query($update_string);
				}
				elseif ( isHoliday ( $date ) == TRUE )
				{
					$daystring = "We are off today, next " . $CN_DISPLAY  . " " . $todays_step;
					$update_string = "UPDATE settings SET daystring = '$daystring'";
					mysql_query($update_string);
				}
				else
				{
						$daystring = "Todays " . $CN_DISPLAY . " " . $todays_step;
						$update_string = "UPDATE settings SET daystring = '$daystring'";
						mysql_query($update_string);
					
				}
				


		}
		if( $current_month != $date['month'] )
		{
			printMonthEnd( $date['wday'] - 1 );
			printMonthStart( $date['month'] , $date['year'] , $date['wday'] );
			$current_month = $date['month'];
		}
		
		if ($date ['wday'] == DAY_SUNDAY || $date ['wday'] == DAY_SATURDAY || isHoliday ( $date ) == TRUE ) 
		{
			printDayColumn( $date['mday'] , "--" );
			
			if ($date ['wday'] == DAY_SATURDAY)
				echo "</tr><tr>";
		} 
		else 
		{
			printDayColumn( $date['mday'] , $current_step );
			
			if ($current_step == $step_limit) 
				$current_step = 1;
			else
				$current_step ++;
		}
		
	}
	?>