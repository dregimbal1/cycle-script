{config_load file="test.conf" section="setup"}
{include file="header.tpl" title=General}
			<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>General Settings</h3>
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
					<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
						
						<div class="notification attention png_bg">
							<a href="#" class="close"><img src="templates/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
							<div>
								Never leave settings blank, it could result in malfunction of the program.
							</div>
						</div>
					

					
						<form name="form1" method="post" action="modify.php">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
								<p>
									<label>Number of Days</label>
										<input class="text-input small-input" type="text" id="numcycle" name="numcycle" value="{$numcycle}" /> 
										<br /><small>Single Integer. Example: 6, 5, 3, 8</small>
								</p>
								<p>
									<label>Start Date</label>
										<input class="text-input small-input" type="text" id="startdate" name="startdate" value="{$startdate}" /> 
										<br /><small>Example: September 14. 2012</small>
								</p>
								<p>
									<label>End Date</label>
										<input class="text-input small-input" type="text" id="enddate" name="enddate" value="{$enddate}" /> 
										<br /><small>Example: September 14, 2013</small>
								</p>
								<p>
									<label>Cycle Name</label>
										<input class="text-input small-input" type="text" id="cyclename" name="cyclename" value="{$cyclename}" /> 
										<br /><small>Example: Cycle Day or Step</small>
								</p>
								<p>
									<input class="button" type="submit" name="Submit" value="Save" />
								</p>
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						
					</div>
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
			
{include file="footer.tpl"}