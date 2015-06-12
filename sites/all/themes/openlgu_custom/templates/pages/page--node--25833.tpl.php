<?php
	// Dashboards Page template
	
	// If this is a sub-dashboard page (e.g., a dashboard for only one project
	// then the GET variable of ptaxid will provide the term id for filtering
	// the views graphs.
	
	if(isset($_GET['ptaxid'])) { 
		$project_term_id = $_GET['ptaxid']; 
		$term = taxonomy_term_load($project_term_id);
		$project_term_name = $term->name;
	}
	
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
              		<li><a href="/projects-overview">All Projects and Programs</a></li>
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
			 <?php if($project_term_name) : ?>
			 	<h1>Dashboard: <?php echo $project_term_name; ?></h1>
			 <?php else: ?>
			 	<h1>Dashboard: All Projects and Programs</h1>
			 <?php endif; ?>
			
			 </div>
		</div>
		 <div class="row-fluid data-pg content">
			 <div class="span12">
			
			<!--Horizontal Tab-->
		   		<?php print $messages; ?>
		        <?php print render($page['help']); ?>
		        <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
					<div class="row-fluid"><p class="intro-sentence">The summary status of projects are presented through the dashboard shown on this page.</p>
	                <div>
					<div class="row-fluid overview-content">
                    <div class="span12">
                    	<h2>Number of <?php if($project_term_name) { echo $project_term_name; echo " "; } ?>Projects by Implementing Agency</h2>
						<p class="mini-graph-switcher">Show:</p><ul id="mini-graph-block-3" class="mini-graph-switcher"><li class="2013">2013</li><li class="2014">2014</li><li class="2015">2015</li></ul>
						<div style="clear:both"></div>
						<?php if($project_term_id) { 
							print views_embed_view("projects_by_agency","block_1",$project_term_id);
							print views_embed_view("projects_by_agency","block_2",$project_term_id);
							print views_embed_view("projects_by_agency","block_3",$project_term_id);
						} else { 
							print views_embed_view("projects_by_agency","block_1","all");
							print views_embed_view("projects_by_agency","block_2","all");
							print views_embed_view("projects_by_agency","block_3","all");
						} ?>
						
						<h2>Number of <?php if($project_term_name) { echo $project_term_name; echo " "; } ?>Projects by Region</h2>
						<p class="mini-graph-switcher">Show:</p><ul id="mini-graph-block-4" class="mini-graph-switcher"><li class="2013">2013</li><li class="2014">2014</li><li class="2015">2015</li></ul>
						<div style="clear:both"></div>	
						<?php if($project_term_id) { 					
							print views_embed_view("dashboards_projects_by_region","block_4",$project_term_id);
							print views_embed_view("dashboards_projects_by_region","block_5",$project_term_id);
							print views_embed_view("dashboards_projects_by_region","block_6",$project_term_id);

						} else {
							print views_embed_view("dashboards_projects_by_region","block_4");
							print views_embed_view("dashboards_projects_by_region","block_5");		
							print views_embed_view("dashboards_projects_by_region","block_6");		

						} ?>
						
						<h2>Number of <?php if($project_term_name) { echo $project_term_name; echo " "; } ?>Projects by Project Type</h2>
						<p class="mini-graph-switcher">Show:</p><ul id="mini-graph-block-5" class="mini-graph-switcher"><li class="2013">2013</li><li class="2014">2014</li><li class="2015">2015</li></ul>
						<div style="clear:both"></div>	
						<?php if($project_term_id) { 					
							print views_embed_view("dashboards_projects_by_project_type","block_1",$project_term_id);
							print views_embed_view("dashboards_projects_by_project_type","block_2",$project_term_id);
							print views_embed_view("dashboards_projects_by_project_type","block_3",$project_term_id);
						} else {
							print views_embed_view("dashboards_projects_by_project_type","block_1");
							print views_embed_view("dashboards_projects_by_project_type","block_2");							
							print views_embed_view("dashboards_projects_by_project_type","block_3");							
						} ?>
					</div>
						<div class="span5 chart-sb sop-chart">
							<h5>Status of <?php if($project_term_name) { echo $project_term_name; echo " "; } ?>Projects</h5>
							<p class="mini-graph-switcher">Show:</p><ul id="mini-graph-block-1" class="mini-graph-switcher"><li class="2013">2013</li><li class="2014">2014</li><li class="2015">2015</li></ul>
							<div style="clear:both"></div>
							<?php if($project_term_id) {
								print views_embed_view('mini_graphs_block_take_2_','block',$project_term_id);
								print views_embed_view('mini_graphs_block_take_2_','block_2',$project_term_id);
								print views_embed_view('mini_graphs_block_take_2_','block_4',$project_term_id);
							} else {
								print views_embed_view('mini_graphs_block_take_2_','block');
								print views_embed_view('mini_graphs_block_take_2_','block_2');								
								print views_embed_view('mini_graphs_block_take_2_','block_4');								
							}?>
						</div>
						<div class="span1"></div>
						<div class="span5 bop-chart">		
							<h5>Budget of <?php if($project_term_name) { echo $project_term_name; echo " "; } ?>Projects</h5>
							<p class="mini-graph-switcher">Show:</p><ul id="mini-graph-block-2" class="mini-graph-switcher"><li class="2013">2013</li><li class="2014">2014</li><li class="2015">2015</li></ul>
							<div style="clear:both"></div>
							<?php if($project_term_id) {
								print views_embed_view('mini_graphs_block_take_2_','block_1',$project_term_id);
								print views_embed_view('mini_graphs_block_take_2_','block_3',$project_term_id);
								print views_embed_view('mini_graphs_block_take_2_','block_5',$project_term_id);
							} else {
								print views_embed_view('mini_graphs_block_take_2_','block_1');
								print views_embed_view('mini_graphs_block_take_2_','block_3');
								print views_embed_view('mini_graphs_block_take_2_','block_5');
							} ?>
													
						</div>
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
