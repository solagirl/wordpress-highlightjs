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
	$('head').append('<style>pre{position:relative}.pre-code-elem{position:absolute;right:.5rem;top:.5rem;color:var(--selection-color)}.copy-done{color:#8bc34a}.copy-code{cursor:pointer}.copy-code:hover{color:#be8f7e}.copy-done svg{display:inline;vertical-align:middle}</style>');
	$.ajax({
	  url: '<?php echo get_stylesheet_directory_uri();?>/plugins/highlightjs/highlight-with-clipboard.min.js',
	  dataType: "script",
	  cache:true,
	  success:function(){
	  	hljs.highlightAll();
	  	addCopyBtn();
	  	setupCopyEvent();
	  }
	});

	function addCopyBtn(){
		$('.site-content pre').each(function(){
			if( ! $(this).find('code').length ){
				return false;
			}

			$(this).prepend('<span class="copy-done pre-code-elem" style="display:none"><svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor"><rect fill="none" height="24" width="24"/><path d="M22,5.18L10.59,16.6l-4.24-4.24l1.41-1.41l2.83,2.83l10-10L22,5.18z M19.79,10.22C19.92,10.79,20,11.39,20,12 c0,4.42-3.58,8-8,8s-8-3.58-8-8c0-4.42,3.58-8,8-8c1.58,0,3.04,0.46,4.28,1.25l1.44-1.44C16.1,2.67,14.13,2,12,2C6.48,2,2,6.48,2,12 c0,5.52,4.48,10,10,10s10-4.48,10-10c0-1.19-0.22-2.33-0.6-3.39L19.79,10.22z"/></svg> Copied!</span><svg class="copy-code pre-code-elem" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M16 1H4c-1.1 0-2 .9-2 2v14h2V3h12V1zm3 4H8c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 16H8V7h11v14z"/></svg>');
		});
	}

	function setupCopyEvent(){
		const clipboard = new ClipboardJS('pre .copy-code', {
		    target: function(trigger) {
		        return trigger.nextElementSibling;
		    }
		});
		clipboard.on('success', function(e) {
		    $(e.trigger).fadeOut(200);
		    $(e.trigger).prev().slideDown(700);
		    e.clearSelection();

		    setTimeout(function(){
		    	$(e.trigger).fadeIn(700);
		    	$(e.trigger).prev().slideUp(200);
		    	
		    },3000);
		});
	}
});
</script>
<?php
}, 100);