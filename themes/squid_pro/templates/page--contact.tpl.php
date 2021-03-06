<?php
/**
 * @file
 * Squid Pro's theme implementation to display Drupal's contact page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/garland.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['content']: The main content of the current page.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 */
?>
<div id="page_wrap" class="container_12">
  <header id="masthead" role="banner" class="grid_12">
    <hgroup id="logo_wrap" class="grid_6">
      <?php if ($logo): ?><div id="logoimg"><a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><img src="<?php print $logo; ?>"/></a></div><?php endif; ?>
    <?php if ($display_sitename): ?> <h1 id="sitename"><a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><?php print $site_name; ?></a></h1><?php endif; ?>
	  <?php if ($site_slogan): ?><h2 id="site-slogan"><?php print $site_slogan; ?></h2><?php endif; ?>
    </hgroup>
    <?php if ($display_social_icons): ?>
    <div class="social-icons-wrap grid_6">
      <ul class="social-icons">
	    <?php if ($twitter_link): ?><li class="twitter">
          <a target="_blank" href="<?php print $twitter_link; ?>"><div class="twitter-icon social-icon"></div></a>
        </li><?php endif; ?>
        <?php if ($facebook_link): ?><li class="facebook">
          <a target="_blank" href="<?php print $facebook_link; ?>"><div class="facebook-icon social-icon"></div></a>
        </li><?php endif; ?>
        <?php if ($googleplus_link): ?><li class="google-plus">
          <a target="_blank" href="<?php print $googleplus_link; ?>"><div class="google-icon social-icon"></div></a>
        </li><?php endif; ?>
        <?php if ($linkedin_link): ?><li class="linkedin">
          <a target="_blank" href="<?php print $linkedin_link; ?>"><div class="linkedin-icon social-icon"></div></a>
        </li><?php endif; ?>
        <?php if ($youtube_link): ?><li class="youtube">
          <a target="_blank" href="<?php print $youtube_link; ?>"><div class="youtube-icon social-icon"></div></a>
        </li><?php endif; ?>
      </ul>
    </div>
    <?php endif; ?>
      <div id="nav_search_envelope" class="grid_12">
	  <?php if ($display_search): $nav_grid_type = "grid_9";  else:  $nav_grid_type = "grid_12"; endif; ?>
	  <nav id="navigation" role="navigation" class="<?php print $nav_grid_type; ?> alpha clearfix">
        <div id="main-menu">
          <?php 
            if (module_exists('i18n_menu')):
              $main_menu_tree = i18n_menu_translated_tree(variable_get('menu_main_links_source', 'main-menu'));
             else:
              $main_menu_tree = menu_tree(variable_get('menu_main_links_source', 'main-menu'));
            endif;
            print drupal_render($main_menu_tree);
          ?>
        </div>
      </nav>
	  <?php if ($display_search): ?>
	  <div id="squidpro_search" class="grid_3 clearfix">
	  <?php print $squidpro_search_block; ?>
	  </div>
	  <?php endif; ?>
	  </div>
  </header>

<div id="header-wrap" class="grid_12 clearfix">
<!-- preface region starts here -->
    <?php if($page['preface_first'] || $page['preface_second'] || $page['preface_third'] || $page['preface_fourth']) : ?>
	 <div id="preface-header" class="grid_12">
	  <?php $preface_blcks = ((bool) $page['preface_first'] + (bool) $page['preface_second'] + (bool) $page['preface_third'] + (bool) $page['preface_fourth']);
      switch ($preface_blcks):
      case 1: $prfc_hdr_grid_type = "grid_12"; break;

      case 2: $prfc_hdr_grid_type = "grid_6"; break;

      case 3: $prfc_hdr_grid_type = "grid_4"; break;

      case 4: $prfc_hdr_grid_type = "grid_3";
      endswitch; ?>
      <?php if($page['preface_first']): ?>
      <div class="<?php print $prfc_hdr_grid_type; ?>"><?php print render ($page['preface_first']); ?></div>
	  <?php endif; ?>
	  <?php if($page['preface_second']): ?>
      <div class="<?php print $prfc_hdr_grid_type; ?>"><?php print render ($page['preface_second']); ?></div>
	  <?php endif; ?>
	  <?php if($page['preface_third']): ?>
      <div class="<?php print $prfc_hdr_grid_type; ?>"><?php print render ($page['preface_third']); ?></div>
	  <?php endif; ?>
	  <?php if($page['preface_fourth']): ?>
	  <div class="<?php print $prfc_hdr_grid_type; ?>"><?php print render ($page['preface_fourth']); ?></div>
	  <?php endif; ?>
    </div>
    <?php endif; ?>

<!-- preface region ends here -->
    <?php if ($page['header']): ?><div id="header_main" class="grid_12 clearfix"><?php print render($page['header']); ?></div><?php endif; ?>
</div>
<!-- main content begins here -->
  <div id="content-wrap" class="grid_12 clearfix">    

  <section id="content" role="main">
      <?php if ($display_breadcrumb): ?><?php if ($breadcrumb): ?><div id="breadcrumbs"><?php print $breadcrumb; ?></div><?php endif;?><?php endif; ?>
      <?php print $messages; ?>
      <?php if ($page['content_top']): ?><div id="content_top"><?php print render($page['content_top']); ?></div><?php endif; ?>
      <?php print render($title_prefix); ?>
      <?php if ($title): ?><h1 class="page-title"><?php print $title; ?></h1><?php endif; ?>
      <?php print render($title_suffix); ?>
      <?php if (!empty($tabs['#primary'])): ?><div class="tabs-wrapper"><?php print render($tabs); ?></div><?php endif; ?>
      <?php print render($page['help']); ?>
      <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
      <?php if ($page['content']): ?><div id="content_main"><?php print render($page['content']); ?></div><?php endif; ?>
    </section> <!-- /#main -->

  </div>
<!-- main content ends here -->
  <div id="footer-wrap" class="grid_12 clearfix">
 <?php if ($page['footer']): ?>
      <div id="footer-top"> 
      <?php print render($page['footer']); ?>
	  </div>
 <?php endif; ?>

 <?php if ($page['footer_first'] || $page['footer_second'] || $page['footer_third'] || $page['footer_fourth']): ?>
 <hr class="carved" />
 <div id="footer-bottom" class="grid_12">
  <?php $footer_blcks = ((bool) $page['footer_first'] + (bool) $page['footer_second'] + (bool) $page['footer_third'] + (bool) $page['footer_fourth']);
    switch ($footer_blcks):
      case 1: $foot_btm_grid_type = "grid_12"; break;

      case 2: $foot_btm_grid_type = "grid_6"; break;

      case 3: $foot_btm_grid_type = "grid_4"; break;

      case 4: $foot_btm_grid_type = "grid_3";
      endswitch; ?>
    <?php if ($page['footer_first']): ?>
    <div class="<?php print $foot_btm_grid_type; ?>"><?php print render($page['footer_first']); ?></div>
    <?php endif; ?>
    <?php if ($page['footer_second']): ?>
    <div class="<?php print $foot_btm_grid_type; ?>"><?php print render($page['footer_second']); ?></div>
    <?php endif; ?>
    <?php if ($page['footer_third']): ?>
    <div class="<?php print $foot_btm_grid_type; ?>"><?php print render($page['footer_third']); ?></div>
    <?php endif; ?>
    <?php if ($page['footer_fourth']): ?>
    <div class="<?php print $foot_btm_grid_type; ?>"><?php print render($page['footer_fourth']); ?></div>
    <?php endif; ?>
    </div>
 <?php endif; ?>
   </div>
</div>
<div id="copyright_area">
<div id="copy_credit"><span><?php print t('Copyright'); ?> &copy; <?php echo date("Y"); ?> - <a href="<?php print $front_page; ?>"><?php print $site_name; ?></a></span><span>|</span><span><?php print t('Theme by'); ?>  <a href="http://myndsets.com" target="_blank">Myndsets</a></span></div>
</div>
<div id="closing_tag">&nbsp;</div>