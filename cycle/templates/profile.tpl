{config_load file="test.conf" section="setup"}
{include file="header.tpl" title=Profile}
			<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>Add User</h3>
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
					<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
						
						<div class="notification attention png_bg">
							<a href="#" class="close"><img src="templates/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
							<div>
								How are you doing {$user}? Below you can modify your settings.
							</div>
						</div>




	<form name="form1" method="post" action="profile.php" style="padding:5px;">
	
	<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								<p>
									<label>Old Password</label>
										<input class="text-input small-input" type="password" id="oldpwd" name="oldpwd" /> 
										<br /><small>To authorize the account holder, please enter your old password</small>
								</p>	
								<p>
									<label>New Password</label>
										<input class="text-input small-input" type="password" id="newpwd" name="newpwd" /> 
										<br /><small>Must be at least 5 characters</small>
								</p>	


          <input type="submit" name="Submit" class="button" value="Change">

		</fieldset>

	</form>
	
						
					</div>
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
			
{include file="footer.tpl"}