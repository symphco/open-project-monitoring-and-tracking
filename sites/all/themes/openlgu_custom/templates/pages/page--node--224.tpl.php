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
	
	
	
	<div class="featured-2">
	 <div class="container">
	  <div class="social">
	  	<img src="<?php print $base_path; ?>sites/all/themes/openlgu_custom/images/service-links/facebook.png">
			  	<img src="<?php print $base_path; ?>sites/all/themes/openlgu_custom/images/service-links/twitter.png">
			  	<img src="<?php print $base_path; ?>sites/all/themes/openlgu_custom/images/service-links/forward.png">

	  </div>
		 <div class="row-fluid news-hdr">
		  <div class="span12">
			  <h1>News</h1>
		</div>
			</div>
	  
	  <div class="row-fluid">
	  
	   <div class="span9">

	   	    <?php print views_embed_view('various_news_blocks','block_1'); ?>

<!--
	    <div id="responsive"> 
			<img src="<?php print $base_path; ?><?php print $directory; ?>/dummy-images/overflow.jpg" data-caption="#htmlCaption1" />
			<img src="<?php print $base_path; ?><?php print $directory; ?>/dummy-images/captions.jpg" data-caption="#htmlCaption2" />
			<img src="<?php print $base_path; ?><?php print $directory; ?>/dummy-images/features.jpg" data-caption="#htmlCaption2" />
		</div>
-->
	   
<!--
	   <div class="orbit-caption" id="htmlCaption1">
                <h2>CAPTION 1 MASTER CLASS</h2>
                <p>Presidential Spokesperson Edwin Lacierda speaks to the Open Data Master Class, a gathering wherein data handlers from different government departments were briefed.</p>  
       </div>
       <div class="orbit-caption" id="htmlCaption2">
                <h2>CAPTION 2 MASTER CLASS</h2>
                <p>Presidential Spokesperson Edwin Lacierda speaks to the Open Data Master Class, a gathering wherein data handlers from different government departments were briefed.</p>  
       </div>
       <div class="orbit-caption" id="htmlCaption3">
                <h2>CAPTION 3 MASTER CLASS</h2>
                <p>Presidential Spokesperson Edwin Lacierda speaks to the Open Data Master Class, a gathering wherein data handlers from different government departments were briefed.</p>  
       </div>
	   
-->
	   </div>
	   <div class="span3 blog-container">
	    <div class="headlines">
		 <h2><img src="<?php print $base_path; ?><?php print $directory; ?>/images/ico_headlines.jpg" class="news-ico"> Headlines</h2>
		 
		 <?php print views_embed_view('various_news_blocks','block_2'); ?>
		 		
	   </div>
	   
	  </div>
	 </div>
	</div>
	
	<div class="main_contant">
	 <div class="container">
		  <div class="row-fluid">
		 <div class="span12 recently-container">
		    <div class="recently">
			<h2><img src="<?php print $base_path; ?><?php print $directory; ?>/images/ico_news.jpg"> All News Articles</h2>
				</div>
			 </div>
			  </div>
		 <div class="row-fluid">
		 <?php print views_embed_view('all_news_page','block_1'); ?>
<!--
		     <div class="span6 recently-container">
		    <div class="recently">
		    	<?php print views_embed_view('all_news_page','block_1'); ?>				
			</div>
		   
			 
		   </div>
		     <div class="span6 recently-container">
		    <div class="recently">
		    	<?php print views_embed_view('all_news_page','block_2'); ?>				
			</div>
-->
		   
			 
		   </div>
		
		</div></div></div>
	
	<?php 
		include('footer.tpl.php');
	?>

    <!--/.fluid-container-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php print $base_path; ?><?php print $directory; ?>/imagesjs/bootstrap-dropdown.js"></script>
    <script src="<?php print $base_path; ?><?php print $directory; ?>/imagesjs/bootstrap-collapse.js"></script>
    <script src="<?php print $base_path; ?><?php print $directory; ?>/imagesjs/bootstrap-typeahead.js"></script>
