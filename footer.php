<?php
  $type = get_post_type();
	switch($type){
		case 'press_release':
		break;
		default:
			get_template_part("partials/form", "demo");
		break;
	}
?>
<?php
	$num_cols = 0;
	if ( is_active_sidebar( 'sidebar-social' )  ) $num_cols ++;
	if ( is_active_sidebar( 'sidebar-contact' )  ) $num_cols ++;
	if ( is_active_sidebar( 'sidebar-location' )  ) $num_cols ++;
	if ( is_active_sidebar( 'sidebar-1' )  ) $num_cols ++;
	if ( is_active_sidebar( 'sidebar-2' )  ) $num_cols ++;
	
	if ( $num_cols > 0 ) : ?>
<footer>
<?php $lg_cols = floor(12/$num_cols); ?>
	<div class="wrap align-top">
	<?php if ( is_active_sidebar( 'sidebar-social' )  ) : ?>
		<div class="cell small-12 large-<?php echo $lg_cols; ?> order-7">
			<?php dynamic_sidebar( 'sidebar-social' ); ?>
		</div>
	<?php endif; ?>
	<?php if ( is_active_sidebar( 'sidebar-contact' )  ) : ?>
		<div class="cell small-12 medium-6 large-<?php echo $lg_cols; ?>">
		<?php dynamic_sidebar( 'sidebar-contact' ); ?>
		</div>
	<?php endif; ?>
	<?php if ( is_active_sidebar( 'sidebar-location' )  ) : ?>
		<div class="cell small-12 medium-6 large-<?php echo $lg_cols; ?>">
		<?php dynamic_sidebar( 'sidebar-location' ); ?>
		</div>
	<?php endif; ?>
	<?php if ( is_active_sidebar( 'sidebar-1' )  ) : ?>
		<div class="cell small-12 medium-6 large-<?php echo ($lg_cols + 1); ?>">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div>
	<?php endif; ?>
	<?php if ( is_active_sidebar( 'sidebar-2' )  ) : ?>
		<div class="cell small-12 medium-6 large-<?php echo ($lg_cols + 1); ?>">
		<?php dynamic_sidebar( 'sidebar-2' ); ?>
		</div>
	<?php endif; ?>
	</div>
</footer>
<?php endif; ?>
<script type="text/javascript">
  jQuery(function() { jQuery('.no-touch .no-link > a').off('click').removeAttr('href'); });
  jQuery(document).ready(function() {
    jQuery('.request-btn').on('click', function(ev) {
      jQuery("#" + ev.currentTarget.id + "-form").removeClass('hide');
      jQuery("#" + ev.currentTarget.id).hide();
      try {analytics.track('Engage Btn Click', {type: ev.currentTarget.id, page: window.location.pathname});} catch(e) {}
    });
    jQuery('.fancybox-media a').fancybox({
      openEffect  : 'none',
      closeEffect : 'none',
      padding: 0,
      width: jQuery(window).width()-70,
      height: jQuery(window).height()-70,
      helpers : {
        media : {}
      },
      afterShow: function () {
        try {
          if (this.element[0].host === 'vimeo.com') {
            analytics.track('Play Video', {video: this.element[0].href, page: window.location.href});
          } else {
            analytics.track('Expand Photo', {photo: this.element[0].href, page: window.location.href});
          }
        } catch (e) {}
      }
    });
  });
    function getCookie(cname) {
       var name = cname + "=";
       var ca = document.cookie.split(';');
       for(var i=0; i<ca.length; i++) {
           var c = ca[i];
           while (c.charAt(0)==' ') c = c.substring(1);
            if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
       }
       return "";
   }
   var user_id = getCookie('hubspotutk');
   if (user_id) {
      try{ analytics.identify(user_id, {'window_height': jQuery(window).height(), 'window_width': jQuery(window).width()}); } catch(e) {};
   }
<?php
	global $app_styles, $app_json;
	$backslash_styles = str_replace('\\', '\\\\', $app_styles);
	$clean_styles = preg_replace('!\s+!', ' ', $backslash_styles);
	$clean_styles_w = str_replace("'", "\"", $clean_styles);
?>

	php = {
	    hasAdminbar: <?php if(is_admin_bar_showing()) { echo 'true'; } else { echo 'false'; }; ?>,
	    json: (<?php echo json_encode($app_json); ?> != null) ? <?php echo json_encode($app_json); ?> : '',
	    styles: '<?php echo $clean_styles_w; ?>',
	    jsPath: '<?php echo THEME_JS; ?>'
  	};

	var styleTag = document.createElement('style'),
		head = document.getElementsByTagName('head')[0];

	styleTag.type = 'text/css';
	styleTag.innerHTML = php.styles;
	head.appendChild(styleTag);

</script>
<a href="#" class="mk-go-top"><i class="mk-icon-chevron-up"></i></a>
<?php
	do_action('quick_contact');
	do_action('full_screen_search_form');
?>
<script type="text/javascript">
	var require = {
		// Base path for application modules
		baseUrl: php.jsPath + '/require/modules',

		// Paths for extra modules.
		// We can use folder names but we prefere do define shortcuts.
		// Never add .js to the declaration
		paths: {
			// Library modules
			'async': '../lib/async',
			'fastdom': '../lib/fastdom',
			'jquery': '../lib/jquery',
			'window': '../lib/window',

			// Plugins
			'plugin': '../plugins/',

			// Utils
			'util': '../utils/',
		}
	};
</script>
<?php wp_footer(); ?>

<?php
	// This produces require() method for theme options
	$require_options = '';
	if($mk_options["disable_smoothscroll"] == "true") {
		$require_options = "require(['util/smoothscroll'])";
	}
?>

<?php
	global $app_modules;

	$modules = array();
	$params = array();


	$modulesLength = count($app_modules);

	if ($modulesLength > 0) {
		foreach ($app_modules as $key => $val) {
			$modules[] = $val["name"];
			$params[] = $val["params"];
		};
	}

	$uniqueModules = array_unique($modules);
	function mk_strtoupper($m) {
	   	return strtoupper($m[1]);
	}
	function toCamel($str) {
		if(version_compare(phpversion(), '5.3', '>=')) {

			return preg_replace_callback( '/-(.?)/', 'mk_strtoupper', $str);
		} else {
			return preg_replace("/\-(.)/e", "strtoupper('\\1')", $str);
		}


	}

	$require = "'".implode("','", $uniqueModules)."'";
	$inject = implode(',', $uniqueModules);
	$injectCamel = toCamel($inject);
?>
<?php if ($modulesLength > 0) : ?>
	<script type="text/javascript">
	// This produces require() method only for shortcodes that are currently in use.
	// Each shortcode is init() with set of it's own configuration based on the user choice.
	// Dependencies and injected values are produced with unique lists, camelCased when needed.
		require([php.jsPath + '/require/app.js'], function() {
	
			<?php echo $require_options; ?>
	
			require([<?php echo $require; ?>], function(<?php echo $injectCamel; ?>) {
				<?php
				for ($i = 0; $i < $modulesLength; $i++) {
					echo toCamel($modules[$i]) . ".init({";
						foreach ($params[$i] as $key => $val) {
							echo $key . ": '$val',";
						}
					echo "}); \n";
					}
				?>
			});
		});
	</script>
<?php endif; ?>
</body>
</html>
