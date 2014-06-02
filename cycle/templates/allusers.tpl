{config_load file="test.conf" section="setup"}
{include file="header.tpl" title=Users}
			<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>All Users</h3>
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
					<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
						
						<div class="notification attention png_bg">
							<a href="#" class="close"><img src="templates/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
							<div>
								To add a user, go to "Add Users"<br />Super Administrators are impossible to delete. This is to prevent lockout or hacking.
							</div>
						</div>

	Page {$paginate.page_current} of {$paginate.page_total} <br />			

    {section name=res loop=$results}
        <div style="width:100%;margin:0 auto;border-top:thin solid #000;">
		<div style="width:600px;margin:0 auto;padding:20px;">
		{$results[res].user_email} <br />
		<div style="border-top:thin solid #000;padding:10px;margin-top:5px;background-color:#CCC;">
		Full Name:&nbsp {$results[res].full_name}
		<div style="float:right;">
			<form method="post" action="{$remove}">
                      <input type="hidden" name="delete_id" value="{$results[res].id}'" >
                      <input type="submit" class="button" name="Del" value="Delete">
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