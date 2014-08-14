<header id="header">
	<div class="container" class="clearfix">
		<?php if ($logo): ?>
			<a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" id="logo">
				<img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
			</a>
		<?php endif; ?>
		<nav id="navigation" class="navigation">
			<?php 
			$main_menu_tree = menu_tree(variable_get('menu_main_links_source', 'main-menu')); 
			print drupal_render($main_menu_tree);
			?>
		</nav> <!-- /#navigation -->
	</div> <!-- /.container for headet top-->
	<!-- START SLIDER -->
	<?php if (theme_get_setting('home_slider')): ?>
	<div class="container clearfix">
		<div id="slider">
			<div class="main_view">
				<div class="window">
					<div class="image_reel">
						<img src="<?php echo theme_get_setting('slider_one_image'); ?>" />
						<img src="<?php echo theme_get_setting('slider_two_image'); ?>" />
						<img src="<?php echo theme_get_setting('slider_three_image'); ?>" />
					</div>
					<div class="slider-title">
						<div class="slidertitle"><?php echo theme_get_setting('slider_one_title'); ?></div>
						<div class="slidertitle"><?php echo theme_get_setting('slider_two_title'); ?></div>
						<div class="slidertitle"><?php echo theme_get_setting('slider_three_title'); ?></div>
					</div>
					<div class="slider-text">
						<div class="slidertext" style="display: none;"><?php echo theme_get_setting('slider_one_desc'); ?></div>
						<div class="slidertext" style="display: none;"><?php echo theme_get_setting('slider_two_desc'); ?></div>
						<div class="slidertext" style="display: none;"><?php echo theme_get_setting('slider_three_desc'); ?></div>
					</div>
				</div>        
				<div class="paging">
					<a rel="1" href="#">1</a>
					<a rel="2" href="#">2</a>
					<a rel="3" href="#">3</a>
				</div>
			</div>
		</div> <!-- end #slider -->
	</div>
	<?php endif; ?>
	<div class="clear"></div>
	<!-- END SLIDER -->
</header> <!-- / end header -->
<section>
	<div id="homepage-header">
		<div class="container" class="clearfix">	
			<?php print $messages; ?>
			<div class="clear"></div>
			<?php if ($page['homepage_header']): ?><!-- / start homepage header block -->
				<div class="page-header">
					<?php print render($page['homepage_header']); ?>
				</div> <!-- / end homepage header -->
			<div class="clear"></div>
			<?php endif; ?>
		</div>
	</div>
</section>
<div class="container clearfix">
	<div class="full">
		<?php if ($page['homepage_one']): ?><!-- / start homepage first block -->
			<div class="one_three">
				<?php print render($page['homepage_one']); ?>
			</div> <!-- / end homepage first block -->
		<?php endif; ?>
		<?php if ($page['homepage_two']): ?><!-- / start homepage second block -->
			<div class="one_three">
				<?php print render($page['homepage_two']); ?>
			</div> <!-- / end homepage first block -->
		<?php endif; ?>
		<?php if ($page['homepage_three']): ?><!-- / start homepage Third block -->
			<div class="one_three_last">
				<?php print render($page['homepage_three']); ?>
			</div> <!-- / end homepage first block -->
		<?php endif; ?>
	</div>
	<div class="clear"></div>
	<?php if ($page['homepage_content']): ?>	
		<div class="full">
			<?php print render($page['homepage_content']); ?>
		</div>
	<?php endif; ?>
	<div class="clear"></div><div class="clear"></div>
</div> <!-- /.container -->
<footer id="footer" role="contentinfo" class="clearfix">
	<div class="container clearfix">	
		<?php if ($page['footer_one']): ?>
			<div class="footer-one">
				<?php print render($page['footer_one']); ?>
			</div>
		<?php endif; ?>
		
		<?php if ($page['footer_two']): ?>
			<div class="footer-two">
				<?php print render($page['footer_two']); ?>
			</div>
		<?php endif; ?>
		
		<?php if ($page['footer_three']): ?>	
			<div class="footer-three">
				<?php print render($page['footer_three']); ?>
			</div>
		<?php endif; ?>
	</div> <!-- /.container -->
</footer> <!-- /#footer -->
<div class="clear"></div>
<div id="footer-bottom">
	<div class="wrap" class="clearfix">	
		<?php if ($page['footer']): ?>
			<div class="footer">
				<?php print render($page['footer']); ?>
			</div>
		<?php endif; ?><!-- /end footer block -->
		<div class="clear"></div>
		<?php if (theme_get_setting('footer_copyright')): ?>
			<div id="copyright"><div class="copyright">Copyright &copy; <?php echo date("Y"); ?>, <?php print $site_name; ?></div></div>
		<?php endif; ?>
		<?php if (theme_get_setting('social_icons')): ?>
			<div id="footer-icons">
				<li><a href="<?php echo check_plain (theme_get_setting('facebook_username')); ?>" class="facebook icon" target="_blank"></a></li>
				<li><a href="<?php echo check_plain (theme_get_setting('twitter_username')); ?>" class="twitter icon" target="_blank"></a></li>
			</div>
		<?php endif; ?>
	</div> <!-- /.container -->
</div>