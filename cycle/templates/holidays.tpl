{config_load file="test.conf" section="setup"}
{include file="header.tpl" title=DaysOff}
			<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>Days Off</h3>
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
					<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
						
						<div class="notification attention png_bg">
							<a href="#" class="close"><img src="templates/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
							<div>
								Add or Delete days you would like to skip. This may be a future or past date.
							</div>
						</div>

<form name="form1" method="post" action="holidays.php" style="padding:5px;">
        <p><br>
          Day Off: 
          <input name="omit" type="text" id="omit">
		  Please enter in format (M D, Y) Ex. Novemeber 15, 2012
		</p>

          <input type="submit" class="button" name="Submit" value="Save">

      </form><br />
	Page {$paginate.page_current} of {$paginate.page_total} <br />			

    {section name=res loop=$results}
        <div style="width:100%;margin:0 auto;border-top:thin solid #000;">
		<div style="width:600px;margin:0 auto;padding:20px;">
		{$results[res].omit} <br />
		<div style="border-top:thin solid #000;padding:10px;margin-top:5px;background-color:#CCC;">
		You posted this on:&nbsp {$results[res].post_time}
		<div style="float:right;">
			<form method="post" action="{$remove}">
                      <input type="hidden" name="delete_id" value="{$results[res].post_id}'" >
                      <input type="submit" name="Del" class="button" value="Delete">
            </form>
        </div>
	</div>
</div>
</div>
    {/section}
	<br />

 {paginate_prev text="Previous Page |"}  {paginate_next text="Next Page"} 
   
	
						
					</div>
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
			
{include file="footer.tpl"}