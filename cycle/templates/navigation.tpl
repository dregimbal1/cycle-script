		<div id="sidebar"><div id="sidebar-wrapper"><!-- Sidebar with logo and menu -->
			<h1 id="sidebar-title"><a href="#">Cycle Script</a></h1>
			<!-- Logo (221px wide) -->
			<a href="#"><img id="logo" src="templates/resources/images/logo.png" alt="" /></a>
			<!-- Sidebar Profile links -->
			<div id="profile-links">
				Hello, {$user}<br />
				<br />
				{$cycleday} | <a href="logout.php" title="Sign Out">Sign Out</a>
			</div>        
			<ul id="main-nav"> <!-- Accordion Menu -->
				<li> 
					<a href="#" class="nav-top-item {if ($page == 'modify' || $page == 'holidays' || $page == 'calendar')}current{/if}"> <!-- Add the class "current" to current menu item -->
					Dashboard
					</a>
					<ul>
						<li><a {if ($page == 'modify')}class="current"{/if} href="modify.php">General Settings</a></li>
						<li><a {if ($page == 'holidays')}class="current"{/if} href="holidays.php">Modify Holidays</a></li> <!-- Add class "current" to sub menu items also -->
						<li><a {if ($page == 'calendar')}class="current"{/if} href="calendar.php">View Calendar</a></li>
					</ul>
				</li>
				<li>
					<a href="#" class="nav-top-item {if ($page == 'allusers' || $page == 'adduser' || $page == 'profile')}current{/if}">
						Manage Users
					</a>
					<ul>
						<li><a {if ($page == 'allusers')}class="current"{/if} href="allusers.php">View Users</a></li>
						<li><a {if ($page == 'adduser')}class="current"{/if} href="adduser.php">Add User</a></li>
						<li><a {if ($page == 'profile')}class="current"{/if} href="profile.php">Edit Profile</a></li>
					</ul>
				</li>
				<li>
					<a href="#" class="nav-top-item {if ($page == 'wfmz')}current{/if}">
						Addons
					</a>
					<ul>
						<li><a {if ($page == 'wfmz')}class="current"{/if} href="wfmz.php">WFMZ</a></li>
					</ul>
				</li>
				<li>
					<a href="#" class="nav-top-item {if ($page == 'tips' || $page == 'update' || $page == 'credits' || $page == 'license')}current{/if}">
						About
					</a>
					<ul>
						<li><a {if ($page == 'tips')}class="current"{/if} href="tips.php">Useful Tips</a></li>
						<li><a {if ($page == 'update')}class="current"{/if} href="update.php">Check Updates</a></li>
						<li><a {if ($page == 'credits')}class="current"{/if} href="credits.php">Credits</a></li>
						<li><a {if ($page == 'license')}class="current"{/if} href="license.php">License</a></li>
					</ul>
				</li>      
				
			</ul> <!-- End #main-nav -->
			
			
		</div></div> <!-- End #sidebar -->