<?php
/**
 * The public-facing functionality of the plugin.
 */
class Simple_Alert_Public {

	public function __construct() {
		add_action('wp_footer',array($this,'show_alert_box'));

	}
	public function show_alert_box(){
		$is_posts 	=	get_option('simple_alert_is_posts');
		$is_pages 	=	get_option('simple_alert_is_pages');
		
		$save_posts 	=	get_option('simple_alert_is_posts');

		if(in_array('post',$save_posts)){
			if(is_single()){
				Simple_Alert_Public::alert_box();
			}
		}
		if(in_array('page',$save_posts)){
			if(is_page()){
				Simple_Alert_Public::alert_box();	
			}
		}
		$post_types = get_post_types( array('public'   => true,'_builtin' => false), 'names', 'and' );

		if(!empty($post_types)){
			foreach($post_types as $post_type){
				if(in_array($post_type,$save_posts)){
					if(is_singular($post_type)){
						Simple_Alert_Public::alert_box();	
					}
				}	
			}
		}
	}
	public function alert_box(){
		$simple_alert_text=get_option('simple_alert_text');
		if($simple_alert_text){
		?>
		<script type="text/javascript">
			alert('<?php echo $simple_alert_text; ?>');
		</script>
		<?php	
		}
		
	}

}
