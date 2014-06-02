{config_load file="test.conf" section="setup"}
{include file="header.tpl" title=WFMZ}
			<div class="content-box"><!-- Start Content Box -->
				<div class="content-box-header">
					<h3>WFMZ - Settings</h3>
					<div class="clear"></div>
				</div> <!-- End .content-box-header -->
				<div class="content-box-content">
					<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
						<div class="notification attention png_bg">
							<a href="#" class="close"><img src="templates/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
							<div>
								To learn more on how this program is tracking WFMZ, read the Documentation or contact me!
							</div>
						</div>
						<form name="form1" method="post" action="wfmz.php">
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								<p>
									<label>District Name</label>
										<input class="text-input small-input" type="text" id="wfmzname" name="wfmzname" value="{$wfmzn}" /> 
										<br /><small>Name of organization, business, or school registered on WFMZ</small>
								</p>
								<p>
									<label>District Notification</label>
										<input class="text-input small-input" type="text" id="wfmzmsg" name="wfmzmsg" value="{$wfmzm}" /> 
										<br /><small>Include a word like "closed" if in the WFMZ message. This will tell the program what to look for.</small>
								</p>
								<p>
									<input class="button" type="submit" name="Submit" value="Save" />
								</p>
							</fieldset>
							<p><b>NOTE:</b> When you fill these settings in the program will check twice a day for updates on WFMZ. This looking up the website as if you were to visit the website in a browser.</p>
							<div class="clear"></div><!-- End .clear -->
						</form>
					</div>
				</div> <!-- End .content-box-content -->
			</div> <!-- End .content-box -->
{include file="footer.tpl"}