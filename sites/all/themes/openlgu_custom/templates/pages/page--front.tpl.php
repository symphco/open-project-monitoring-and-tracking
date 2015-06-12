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
	
	<div class="featured">
	 <div class="container">
	 
	  <div class="social">
	  	<?php
	  		// $services = array('facebook','twitter','forward'); 
	  		// // $servicelinks = service_links_render_some($services,$node,FALSE,NULL);
	  		// foreach($servicelinks as $key => $servicelink) :
	  		// 	if($key == "service-links-forward") {
		  	// 		$servicelink = str_replace("_blank","",$servicelink);
	  		// 	}
	  		// 	// print $servicelink; 
	  		// endforeach; 
	  	?>
	  </div>
	  
	  <div class="row-fluid">

	  <?php print $messages; ?>
	  
	   <div class="span9">
	    
	    <?php print views_embed_view('homepage_image_slider','block'); ?>
	   

	    <?php print views_embed_view('homepage_image_slider','block_1'); ?>
	   
	   </div>
	   <div class="span3 blog-container">
	    <div class="blog">
	    <h3 class="search-title">Duis autem vel eum iriure dolor in hendrerit.</h3>
		 <!-- <img src="<?php print $directory; ?>/images/logo-dilg-smaller.png" class="logo-small"/> -->
		 <?php print render($page['content']); ?>
		 <form id="homepagesearch" name="homepagesearch" action="<?php global $base_path; print $base_path; ?>projects" method="get">
		 	<input type="text" placeholder="Enter feugiat nulla" name="municipality-province" id="municipality-province" value="">
		 	<input type="hidden" name="field_municipality_by_psgc_tid" id="field_municipality_by_psgc_tid" value="13301000">
		 	<input type="hidden" name="items_per_page" id="items_per_page" value="20">
		 	<input type="hidden" name="status" id="status" value="unsubmitted">
		 	<input type="submit" name="submit" id="submit" value="Search">
		 </form>
		</div> 
	   </div>
	   
	  </div>
	 </div>
	</div>
	
	
	<div class="main_contant">
	 <div class="container">
		 <div class="row-fluid">
		 
		   <div class="span6">
		     <div class="find_project">
			  <h2>FIND A PROJECT</h2>
<!--
			  <div class="search_project">
			  
			   <div class="bubble">
			    
				<p>
				 <span><img src="<?php print $base_path; ?><?php print $directory; ?>/images/bubble_arrow.png"  /></span>
				We have no record of this project in our database. Please try again or refine you search using our advance search function on the Projects page</p>
			   
			   </div>
			   
			   <input type="text" class="search_input" value="Search By Project ID or Project Name">
			   <input type="submit" class="search_btn2">
			  </div>
-->
			  <?php
				  $block = module_invoke('views', 'block_view', '65ffae8f7d92ed08531dc936cb5a3754');
				  print render($block['content']);
			  ?>

			 </div>
			 
			 <div class="browse">
			  <h2><a href="<?php print $base_path; ?>projects">BROWSE PROJECTS</a></h2>
			  <ul>
			  
			   <li><a href="<?php print $base_path; ?>projects">
			    <div class="one">
				 <h3>BROWSE BY</h3>
				 <p>Implementing Agency</p>
				</div></a>
			   </li>
			   
			   <li class="last"><a href="<?php print $base_path; ?>projects">
			    <div class="two">
				 <h3>BROWSE BY</h3>
				 <p>Location</p>
				</div></a>
			   </li>
			   <li><a href="<?php print $base_path; ?>projects">
			    <div class="three">
				 <h3>BROWSE BY</h3>
				 <p>Project Type</p>
				</div></a>
			   </li>
			   
			   <li class="last"><a href="<?php print $base_path; ?>projects">
			    <div class="four">
				 <h3>BROWSE BY</h3>
				 <p>Budget Allocated</p>
				</div></a>
			   </li>
			  </ul>
			  
			 </div>
			 
		   </div>
		   <div class="span6 recently-container">
		    <div class="recently">
			<h2><a href="<?php print $base_path; ?>projects-overview">LATEST UPDATED</a></h2>
			
			<?php print views_embed_view('recently_approved_projects','block'); ?>
			
			
<!-- 				<p class="mini-graph-switcher">Show:</p><ul id="mini-graph-block-1" class="mini-graph-switcher"><li class="2013">2013</li><li class="2014">2014</li></ul> -->
				<?php // print views_embed_view('mini_graphs_block_take_2_','block'); ?>
				<?php // print views_embed_view('mini_graphs_block_take_2_','block_2'); ?>
													


			</div>
		   
		   </div>
		   
		 </div>
		
		<div class="related">
		 
		 <div class="row-fluid related-news">
		  <h2>Related News</h2>
		  
		  <?php print views_embed_view('various_news_blocks','block_6'); ?>
<!--
		   <a href="http://www.dbm.gov.ph" target="_blank"><img src="/<?php //print $directory; ?>/images/logos/150/dbm.png"></a>		   		   
		   <a href="http://www.dilg.gov.ph" target="_blank"><img src="/<?php //print $directory; ?>/images/logos/150/DILG_logo2.png"></a>		   		   
		   <a href="http://www.dswd.gov.ph" target="_blank"><img src="/<?php //print $directory; ?>/images/logos/150/DSWD_logo.png">		   		   
		   <a href="http://www.neda.gov.ph" target="_blank"><img src="/<?php //print $directory; ?>/images/logos/150/NEDA.png"></a>		   		   
		   <a href="http://maps.napc.gov.ph/napcportal" target="_blank"><img src="/<?php //print $directory; ?>/images/logos/150/seal-NAPC.png" class="last"></a>		   		   
-->
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
    <script src="<?php print $directory; ?>/js/bootstrap-dropdown.js"></script>
    <script src="<?php print $directory; ?>/js/bootstrap-collapse.js"></script>
    <script src="<?php print $directory; ?>/js/bootstrap-typeahead.js"></script>
