{config_load file="test.conf" section="setup"}
{include file="header.tpl" title=Calendar}
			<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>Calendar</h3>
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
					<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
						
						<div class="notification attention png_bg">
							<a href="#" class="close"><img src="templates/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
							<div>
								From Start Date to End Date, this is the roadmap of cycle days. Future cycle days are subject to change.
							</div>
						</div>    <iframe frameborder="0"            style="display:block;width:100%;height:300px;"            src="includes/calendar.php">			Please update your browser to view this information    </iframe>				<br />	For the time being the above information is contained in an iframe loaded seperatley on to this page. Please be sure that you are using an update web browser to view this infoemation	<br />	Check regularly for updates to this program.
					</div>
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
			
{include file="footer.tpl"}