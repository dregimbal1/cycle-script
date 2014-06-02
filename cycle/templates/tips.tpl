{config_load file="test.conf" section="setup"}
{include file="header.tpl" title=Tips}
			<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>Useful Tips</h3>
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
					<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
						
						<div class="notification attention png_bg">
							<a href="#" class="close"><img src="templates/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
							<div>
								In order to get the latest build you must contact me directly.
							</div>
						</div>

<p> Here are some useful tips to use this application. <br /> The Cycle Day application can be placed on any page of your website local to your server. However, if you would like to it is possible to extend the cycle day to websites outside your server.</p>
  <br /><br />
  	<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								<p>
									<label>Place Cycle Day on your LOCAL server</label>
										<input class="text-input small-input" type="text" value="<? include ('includes/dbc.php'); echo $DS_DISPLAY; ?>" /> 
										<br /><small>Correct file path for database on any given page</small>
								</p>	
	</fieldset>
	
						
					</div>
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
			
{include file="footer.tpl"}