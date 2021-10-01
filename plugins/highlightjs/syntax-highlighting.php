<?php
// Exit if accessed directly.
defined('WPINC') or exit;


add_action( 'wp_footer', function(){
	if( !is_singular() ){
		return;
	}
	?>
<script>
jQuery(document).ready(function($) {
	if( ! $('.site-content pre > code').length ){return;}
	$('head').append('<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri();?>/plugins/highlightjs/styles/github.min.css" type="text/css" />');
	$.ajax({
	  url: '<?php echo get_stylesheet_directory_uri();?>/plugins/highlightjs/highlight.min.js',
	  dataType: "script",
	  cache:true,
	  success:function(){
	  	 hljs.highlightAll();
	  }
	});
});
</script>
<?php
}, 100);