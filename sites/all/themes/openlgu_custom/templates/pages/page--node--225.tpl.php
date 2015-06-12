<?php
/* 
 * Template File: page--node--225.tpl.php
 * Title: Dashboard Page
 * Purpose: Special display for dashboard page, which is a 
 * 			content type of Basic Page but needs left column instead of right column.
 */
?>
<?php
	global $user;
	$roles = $user->roles;
	$admClass = '';
	if (in_array('administrator', $roles)) {
		$admClass = ' navbar-fixed-top-admin';
	}
?>

    <div class="navbar navbar-inverse navbar-fixed-top<?php echo $admClass ?>">
      <div class="navbar-inner">
        <div class="container">
		
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
		    <p class="menu_link">Menu</p>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="<?php print $base_path; ?>"><img src="<?php print $base_path; ?><?php print $directory; ?>/images/logo_top.png" alt=""></a>
          <div class="nav-collapse collapse">
            
            <ul class="nav">
              <li class="home"><a href="<?php print $base_path; ?>">Home</a></li>
              <li class="about"><a href="<?php print $base_path; ?>about">About</a></li>
              <li class="news"><a href="<?php print $base_path; ?>news">News</a></li>
			  <li class="projects"><a href="<?php print $base_path; ?>projects">Projects</a></li>
			  <li class="map"><a href="<?php print $base_path; ?>map">Map</a></li>
              <li class="overview"><a href="<?php print $base_path; ?>projects-overview">Dashboard</a>
              	<ul class="dropdown-menu">
              		<li><a href="/projects-overview">All BUB Projects and Programs</a></li>
              		<?php foreach ($dashboard_submenu as $dashboard_submenu_item) : ?>
	              		<li><a href="/projects-overview/?ptaxid=<?php print $dashboard_submenu_item['path']; ?>"><?php print $dashboard_submenu_item['name']; ?></a></li>
	              	<?php endforeach; ?>
              	</ul>
              </li>
			  <li class="data"><a href="<?php print $base_path; ?>data">Data</a></li>
			  <li class="contact"><a href="<?php print $base_path; ?>contact">Contact</a></li>
            </ul>
			
			<div class="search_box">
			<?php
				  $block = module_invoke('search_api_page', 'block_view', 'pages_search');
				  print render($block['content']);
			  ?>
			</div>
			
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
	
	<div class="main_header">
	  
	  <div class="container">
	   <div class="row-fluid">
        <div class="span10"><a href="<?php print $base_path; ?>" class="logo"><img src="<?php print $base_path; ?><?php print $directory; ?>/images/logo.png" alt=""></a></div>
		<div class="span2">
		 <?php if($logged_in) : ?>
		 	<div class="login logout"><a href="<?php print $base_path; ?>user/logout">LOGOUT</a></div>
		 <?php else: ?>
		 	<div class="login"><a href="<?php print $base_path; ?>user/login">LOGIN</a></div>
		 <?php endif; ?>
		</div>
	  </div>	
	  
	  </div>
	
	</div>
	
	
	
	<div class="main_content">
	 <div class="container">
		 <div class="row-fluid content page-hdr">
		 	<div class="span12">
			  <div class="social">
			  	<img src="<?php print $base_path; ?>sites/all/themes/openlgu_custom/images/service-links/facebook.png">
			  	<img src="<?php print $base_path; ?>sites/all/themes/openlgu_custom/images/service-links/twitter.png">
			  	<img src="<?php print $base_path; ?>sites/all/themes/openlgu_custom/images/service-links/forward.png">

			  </div>

			 <h1>Grassroots Participatory Budgeting Process - Yoink</h1>
			 
			 </div>
		</div>
		 <div class="row-fluid data-pg content">
		<div id="data-sb" class="span3">
			  <h3>Refine by</h3>

			  		<?php print render($page['sidebar_filter']); ?>
           </div>
         
         
        <div class="span9">
			
			<!--Horizontal Tab-->
		   		<?php print $messages; ?>
		        <a id="main-content"></a>
	            <ul class="resp-tabs-list tabs primary">
	                <li><a href="<?php print $base_path; ?>projects-overview">Overview</a></li>
	                <li><a href="<?php print $base_path; ?>projects">GPB Projects</a></li>
	                <li><a href="<?php print $base_path; ?>map">Map</a></li>
	                <li class="active"><a href="<?php print $base_path; ?>dashboards">Dashboard</a></li>
	            </ul>
		        <div style="clear:both"></div>
		        <?php print render($page['help']); ?>
		        <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
		        <div class="resp-tabs-container">
		        <?php // print render($page['content']); ?>
		        <?php print $feed_icons; ?>

					
                <div>
					<div class="span12">
						<?php print render($page['content']); ?>
					</div>
				</div>                
			</div>
		 </div>
		
		
		 
	  </div>
	</div>
	
	<?php 
		include('footer.tpl.php');
	?>
	

    <!--/.fluid-container-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php print $base_path; ?><?php print $directory; ?>/js/bootstrap-dropdown.js"></script>
    <script src="<?php print $base_path; ?><?php print $directory; ?>/js/bootstrap-collapse.js"></script>
    <script src="<?php print $base_path; ?><?php print $directory; ?>/js/bootstrap-typeahead.js"></script>
